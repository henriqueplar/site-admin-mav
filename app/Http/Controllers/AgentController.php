<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    //
    // GET - /Agents - Exibe uma lista de clientes
    public function index()
    {
        $agents = Agent::all();

        return view('agents.index', ['agents' => $agents]);
    }

    // GET - /Agents/{id}/edit - exibe o fomulário do cliente
    public function edit(Agent $agent)
    {
        return view('agents.edit', compact('Agent'));
    }


    // POST - /Agents - Exibe uma lista de clientes
    public function update(Request $request, Agent $agent)
    {
        $request->validate([
            // Regras de validação dos campos
        ]);

        $agent->update($request->all());

        return redirect()->route('agents.show',  ['agent' => $agent])->with('success', 'Corretor atualizado com sucesso!');
    }

    public function destroy(Agent $agent)
    {
        $agent->delete();

        return redirect()->route('agents.index')->with('success', 'Corretor excluído com sucesso!');
    }

    public function show(Agent $agent)
    {
        return view('agents.show', compact('agent'));
    }

    public function create()
    {
        return view('agents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Regras de validação dos campos
        ]);

        Agent::create($request->all());

        return redirect()->route('agents.index')->with('success', 'Corretor criado com sucesso!');
    }
}
