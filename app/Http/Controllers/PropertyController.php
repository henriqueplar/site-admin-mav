<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Customer;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('customer')->get(); // Eager loading para evitar o problema N+1
        $customers = Customer::all();
        return view('properties.index', compact('properties', 'customers'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('properties.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'status' => 'required|string|in:disponível,vendido,alugado',
            'customer_id' => 'required|exists:customers,id',
        ]);

        Property::create($request->all());

        return redirect()->route('properties.index')->with('success', 'Imóvel criado com sucesso!');
    }

    public function show(Property $property)
    {
        $customers = Customer::all();
        return view('properties.show', compact('property', 'customers'));
    }

    public function edit(Property $property)
    {
        $customers = Customer::all(); // Busca todos os clientes para o dropdown
        return view('properties.edit', compact('property', 'customers'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'status' => 'required|string|in:disponível,vendido,alugado',
            'customer_id' => 'required|exists:customers,id',
        ]);

        $property->update($request->all());

        return redirect()->route('properties.show', $property)->with('success', 'Imóvel atualizado com sucesso!');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Imóvel excluído com sucesso!');
    }
}
