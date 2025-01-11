<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Property;
use App\Models\Customer;
use App\Models\Agent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::with(['property', 'customer', 'agent'])->get()->sortByDesc('id');
        $properties = Property::where('status', 'Disponível')->get();
        $customers = Customer::all();
        $agents = Agent::where('status', 'Ativo')->get();
        return view('contracts.index', compact('contracts', 'properties',  'customers', 'agents'));
    }

    public function create()
    {
        $properties = Property::where('status', 'Disponível')->get();
        $customers = Customer::all();
        $agents = Agent::where('status', 'Ativo')->get();
        return view('contracts.create', compact('properties', 'customers', 'agents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'customer_id' => 'required|exists:customers,id',
            'agent_id' => 'required|exists:agents,id',

        ]);;

        $contract = Contract::create($request->all());

        return redirect()->route('contracts.show', $contract)->with('success', 'Contrato criado com sucesso!');
    }

    public function show(Contract $contract)
    {
        $properties = Property::where('status', 'Disponível')->get();
        $customers = Customer::all();
        $agents = Agent::where('status', 'Ativo')->get();
        return view('contracts.show', compact('contract', 'properties', 'customers', 'agents'));
    }

    public function edit(Contract $contract)
    {
        $properties = Property::all();
        $customers = Customer::all();
        $agents = Agent::where('status', 'Ativo')->get();
        return view('contracts.edit', compact('contract', 'properties', 'customers', 'agents'));
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'customer_id' => 'required|exists:customers,id',
            'agent_id' => 'required|exists:agents,id',
            // adicione aqui as regras de validação para os outros campos
        ]);

        $contract->update($request->all());

        return redirect()->route('contracts.show', $contract)->with('success', 'Contrato atualizado com sucesso!');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();

        return redirect()->route('contracts.index')->with('success', 'Contrato excluído com sucesso!');
    }

    //OTHERS ----------------

    public function calculateAmount(Contract $contract)
    {
        $totalValue = 0;
        $contractDurationMonths = $this->getContractDurationMonths($contract->start_date, $contract->end_date);

        $percentuais = $contract->lines()->where('value_type', 'Percentual')->get();
        $totais = $contract->lines()->where('value_type', 'Valor Cheio')->get();

        foreach ($totais as $line) {
            $lineValue = $line->value;

            if ($line->payment_frequency == 'Mensal') {
                $lineValue *= $contractDurationMonths;
            } elseif ($line->payment_frequency == 'Anual') {
                if ($line->type != 'IPTU') {
                    $lineValue *= $contractDurationMonths / 12;
                } else {
                    $valorParcelaIPTU = $lineValue / $line->installments;
                    $lineValue = 0;
                    $startDate = Carbon::parse($contract->start_date);

                    for ($i = 0; $i < $contractDurationMonths; $i++) {
                        $currentMonth = $startDate->addMonths($i)->month;

                        if ($currentMonth <= $line->installments) {
                            $lineValue += $valorParcelaIPTU;
                        }
                    }
                }
            }

            $totalValue += $lineValue;
        }

        $totalPercentual = $percentuais->sum('percentage');



        $contract->amount = $totalValue * 100 / (100 - $totalPercentual);
        $contract->save();
    }

    private function getContractDurationMonths($startDate, $endDate)
    {
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);
        return floor($startDate->diffInMonths($endDate));
    }

}
