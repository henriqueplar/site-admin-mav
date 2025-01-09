<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{

    private $validate = [];


    /* create ----- (/customers/create) ----- GET */
    public function create(){
        return view('agents.create');
    }

    /* create ----- (/customers) ----- POST */
    public function store(Request $request){
        $request->validate($this->validate);

        Agent::create($request->all());

        return redirect()->route('agents.index')->with('success', 'Corretor criado com sucesso!');
    }


    /* read all ----- (/customers) ----- GET */
    public function index(){
        $agents = Agent::all()->sortBy(['status', 'name']);

        return view('agents.index', ['agents' => $agents]);
    }


    /* read ----- (/customers/{id}) ----- GET */
    public function show(Agent $agent){
        return view('agents.show', compact('agent'));
    }


    /* update ----- (/customers/{id}/edit) ----- GET */
    public function edit(Agent $agent){
        return view('agents.edit', compact('Agent'));
    }


    /* update ----- (/customers/{id}) ----- PUT/PATCH */
    public function update(Request $request, Agent $agent){
        $request->validate($this->validate);

        $agent->update($request->all());

        return redirect()->route('agents.show',  ['agent' => $agent])->with('success', 'Corretor atualizado com sucesso!');
    }

    
    /* delete ----- (/customers/{id}) ----- DESTROY */
    public function destroy(Agent $agent){
        $agent->delete();

        return redirect()->route('agents.index')->with('success', 'Corretor excluído com sucesso!');
    }

}
