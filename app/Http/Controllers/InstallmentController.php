<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Installment;
use App\Models\InstallmentLine;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InstallmentController extends Controller
{
    private $validate = [
        'contract_id' => 'required|exists:contracts,id',
        'number' => 'nullable|integer',
        'dueDate' => 'required|date',
        'amount' => 'required|numeric',
        'status' => 'required|string|in:Pago,Pendente,Vencido,Não Habilitada',
    ];

    /* create ----- (/customers/create) ----- GET */
    public function create()
    {
        $contracts = Contract::all();
        return view('installments.create', compact('contracts'));
    }

    /* create ----- (/customers) ----- POST */
    public function store(Request $request)
    {
        $request->validate($this->validate);

        $installment = Installment::create($request->all());
        $installmentLine = InstallmentLine::create([
            "description" => "N/A",
            "value" => $installment->amount,
            "installment_id" => $installment->id
        ]);

        return redirect()->route('installments.show', $installment)/* ->with('success', 'Parcela criada com sucesso!') */;
    }


    /* read all ----- (/customers) ----- GET */
    public function index()
    {
        $contracts = Contract::all();
        $installments = Installment::with('contract')->get()->sortBy('dueDate');
        return view('installments.index', compact('installments', 'contracts'));
    }


    /* read ----- (/customers/{id}) ----- GET */
    public function show(Installment $installment)
    {
        $contracts = Contract::all();

        return view('installments.show', compact('installment', 'contracts'));
    }


    /* update ----- (/customers/{id}/edit) ----- GET */
    public function edit(Installment $installment)
    {
        $contracts = Contract::all();
        return view('installments.edit', compact('installment', 'contracts'));
    }


    /* update ----- (/customers/{id}) ----- PUT/PATCH */
    public function update(Request $request, Installment $installment)
    {
        $request->validate($this->validate);

        $installment->update($request->all());

        return redirect()->route('installments.show', $installment)->with('success', 'Parcela atualizada com sucesso!');
    }


    /* delete ----- (/customers/{id}) ----- DESTROY */
    public function destroy(Installment $installment)
    {
        $installment->delete();

        return redirect()->route('installments.index')->with('success', 'Parcela excluída com sucesso!');
    }



    //OTHERS --------------------

    public function getStatus()
    {
        return 'Pendente';
    }

    public function calculateAmount(Installment $installment)
    {
        $totalAmount = 0;

        $totalAmount = $installment->lines->sum('value');

        $installment->amount = $totalAmount;
        $installment->save();
    }



    public function generateInstallments(Contract $contract)
    {
        $contractDurationMonths = $this->getContractDurationMonths($contract->start_date, $contract->end_date);

        $startDate = Carbon::parse($contract->start_date);

        for ($i = 0; $i < $contractDurationMonths; $i++) {
            $installment = Installment::create([
                'dueDate' => $startDate->copy()->addMonths($i),
                'amount' => 0,
                'status' => 'Não Habilitada',
                'contract_id' => $contract->id,
            ]);

            foreach ($contract->lines as $line) {
                $description = $line->type;
                $value = 0;

                if ($line->payment_frequency == 'Mensal') {
                    if ($line->value_type == 'Percentual') {
                        $value = ($contract->amount * $line->percentage / 100) / $contractDurationMonths;
                    } elseif ($line->value_type == 'Valor Cheio') {
                        $value = $line->value;
                    }
                } elseif ($line->payment_frequency == 'Anual') {
                    $startMonth = Carbon::parse($contract->start_date)->month;

                    $currentMonth = $startDate->copy()->addMonths($i)->month;


                    if ($line->type != 'IPTU') {
                        if ($i == 0 && ($contractDurationMonths - $i >= 12)) {
                            //ok
                            $value = $line->value * (13 - $currentMonth)/12;

                        }elseif($i == 0 && ($contractDurationMonths - $i < 12)){
                            $value = $line->value * ($contractDurationMonths - $i - $currentMonth)/12;

                        } elseif ($currentMonth == 1 && ($contractDurationMonths - $i >= 12)) {
                            //ok
                            $value = $line->value;

                        } elseif($currentMonth == 1 && ($contractDurationMonths - $i < 12)){

                            $value = $line->value * ($contractDurationMonths - $i)/12;
                        }
                        
                        

                    } else {
                        $valorParcelaIPTU = $line->value / $line->installments;

                        if ($currentMonth <= $line->installments) {
                            $value = $valorParcelaIPTU;

                        }
                    }
                }

                if($value > 0){
                    $installmentLine = InstallmentLine::create([
                        'description' => $description,
                        'value' => $value,
                        'installment_id' => $installment->id,
                    ]);
                }
            }
        }

        return redirect()->route('contracts.show', compact('contract'));
    }

    private function getContractDurationMonths($startDate, $endDate)
    {
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);
        return floor($startDate->diffInMonths($endDate));
    }



    /* public function getBolecode(Installment $installment) {
        if($installment->status != 'Vencido' && $installment->status != 'Pendente' && $installment->status != 'Pago' && $installment->amount > 0){

            $client = new Client([
                'base_uri' => 'https://secure.api.itau/pix_recebimentos_conciliacoes/v2/boletos_pix',
                'cert' => storage_path('app/certificados/certificado.crt'),
                'ssl_key' => storage_path('app/certificados/ARQUIVO_CHAVE_PRIVADA.key'),
                'headers' => [
                    'Authorization' => 'Bearer ',
                    'Content-Type' => 'application/json',
                    'x-itau-apikey' => '',
                    'x-itau-correlationID' => '',
                    'x-itau-flowID' => '1',
                ],
            ]);
        
            try {
                $response = $client->post('boletos', [
                    'json' => [
                        'etapa_processo_boleto' => 'Simulacao',
                        'beneficiario' => [
                            'id_beneficiario' => '078300060809',
                        ],
                        'dado_boleto' => [
                            // ... (preencha os dados do boleto com base no $installment e nos dados do cliente) ...
                        ],
                    ],
                ]);
        
                $dadosBoleto = json_decode($response->getBody(), true);
        
                return $dadosBoleto;
            } catch (RequestException $e) {
                // Trate os erros da requisição, como falha na autenticação, boleto inválido, etc.
                Log::error('Erro na API do Itaú: ' . $e->getMessage()); 
                return null;
            }
        }
    } */
}
