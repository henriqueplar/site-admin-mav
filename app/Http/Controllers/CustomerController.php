<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // GET - /customers - Exibe uma lista de clientes
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', ['customers' => $customers]);
    }

    // GET - /customers/{id}/edit - exibe o fomulário do cliente
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }


    // POST - /customers - Exibe uma lista de clientes
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            // Regras de validação dos campos
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.show',  ['customer' => $customer])->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Cliente excluído com sucesso!');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Regras de validação dos campos
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Cliente criado com sucesso!');
    }
}
