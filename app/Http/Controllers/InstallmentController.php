<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Installment;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    private $validate = [
        'contract_id' => 'required|exists:contracts,id',
        'number' => 'integer',
        'dueDate' => 'required|date',
        'amount' => 'required|numeric',
        'status' => 'required|string|in:Pago,Pendente,Atrasado',
    ];

    public function index()
    {
        $contracts = Contract::all();
        $installments = Installment::with('contract')->get();
        return view('installments.index', compact('installments', 'contracts'));
    }

    public function create()
    {
        $contracts = Contract::all();
        return view('installments.create', compact('contracts'));
    }

    public function store(Request $request)
    {
        $request->validate($this->validate);

        Installment::create($request->all());

        return redirect()->route('installments.index')->with('success', 'Parcela criada com sucesso!');
    }

    public function show(Installment $installment)
    {
        return view('installments.show', compact('installment'));
    }

    public function edit(Installment $installment)
    {
        $contracts = Contract::all();
        return view('installments.edit', compact('installment', 'contracts'));
    }

    public function update(Request $request, Installment $installment)
    {
        $request->validate($this->validate);

        $installment->update($request->all());

        return redirect()->route('installments.show', $installment)->with('success', 'Parcela atualizada com sucesso!');
    }

    public function destroy(Installment $installment)
    {
        $installment->delete();

        return redirect()->route('installments.index')->with('success', 'Parcela excluída com sucesso!');
    }


}