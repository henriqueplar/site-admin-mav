<?php

namespace App\Http\Controllers;

use App\Models\ContractLine;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractLineController extends Controller
{
    public function index(Contract $contract)
    {
        $contractLines = $contract->lines; 
        return view('contract-lines.index', compact('contract', 'contractLines'));
    }

    public function create(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'type' => 'required|string',
            'value_type' => 'required|string|in:Valor Cheio,Percentual',
            'value' => 'nullable|numeric',
            'percentage' => 'nullable|numeric',
            'payment_frequency' => 'required|string|in:Anual,Mensal',
            'installments' => 'nullable|integer',
        ]);

        ContractLine::create($request->all());

        return redirect()->route('contracts.show', $request->contract_id)->with('success', 'Linha de contrato criada com sucesso!');
    }

    public function show(ContractLine $contractLine)
    {
        return view('contract-lines.show', compact('contractLine'));
    }

    public function edit(ContractLine $contractLine)
    {
        return view('contract-lines.edit', compact('contractLine'));
    }

    public function update(Request $request, ContractLine $contractLine)
    {
        $request->validate([
            'contract_id' => 'required|exists:contracts,id',
            'type' => 'required|string',
            'value_type' => 'required|string|in:Valor Cheio,Percentual',
            'value' => 'nullable|numeric',
            'percentage' => 'nullable|numeric',
            'payment_frequency' => 'required|string|in:Anual,Mensal',
            'installments' => 'nullable|integer',
        ]);

        $contractLine->update($request->all());

        return redirect()->route('contracts.show', $contractLine->contract_id)->with('success', 'Linha de contrato atualizada com sucesso!');
    }

    public function destroy(ContractLine $contractLine)
    {
        $contractLine->delete();

        return redirect()->route('contracts.show', $contractLine->contract_id)->with('success', 'Linha de contrato excluída com sucesso!');
    }
}