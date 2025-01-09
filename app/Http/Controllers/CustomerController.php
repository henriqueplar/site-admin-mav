<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller{

    private $validate = [
        'type' => 'required|in:Pessoa Física,Pessoa Jurídica',
        'document' => 'required|string|min:14|max:18', 
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15', 
        'email' => 'required|email|max:255', 
    ];


    /* create ----- (/customers/create) ----- GET */
    public function create(){
        return view('customers.create');
    }

    /* create ----- (/customers) ----- POST */
    public function store(Request $request){
        $request->validate($this->validate);

        $customer = Customer::create($request->all());

        return redirect()->route('customers.show', $customer)->with('message', 'Cliente criado com sucesso!');
    }


    /* read all ----- (/customers) ----- GET */
    public function index(){
        $customers = Customer::all()->sortBy('name');
        return view('customers.index', ['customers' => $customers]);
    }


    /* read ----- (/customers/{id}) ----- GET */
    public function show(Customer $customer){
        return view('customers.show', compact('customer'));
    }


    /* update ----- (/customers/{id}/edit) ----- GET */
    public function edit(Customer $customer){
        return view('customers.edit', compact('customer'));
    }


    /* update ----- (/customers/{id}) ----- PUT/PATCH */
    public function update(Request $request, Customer $customer)
    {
        $request->validate($this->validate);

        $customer->update($request->all());

        return redirect()->route('customers.show',  ['customer' => $customer])->with('success', 'Cliente atualizado com sucesso!');
    }

    
    /* delete ----- (/customers/{id}) ----- DESTROY */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
