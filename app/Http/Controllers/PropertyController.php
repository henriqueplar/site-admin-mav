<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Customer;
use Illuminate\Http\Request;

class PropertyController extends Controller{

    private $validate = [
        'street' => 'sometimes|string|max:255',
        'number' => 'required|string|max:255',
        'complement' => 'nullable|string|max:255',
        'neighborhood' => 'sometimes|string|max:255',
        'city' => 'sometimes|string|max:255',
        'state' => 'sometimes|string|max:255',
        'zip_code' => 'required|string|max:9',
        'status' => 'required|string|in:Disponível,Vendido,Alugado',
        'customer_id' => 'required|exists:customers,id',
    ];


    /* create ----- (/customers/create) ----- GET */
    public function create(){
        $customers = Customer::all();
        return view('properties.create', compact('customers'));
    }

    /* create ----- (/customers) ----- POST */
    public function store(Request $request){
        $request->validate($this->validate);

        try {
            Property::create($request->all());
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('properties.index')->with('success', 'Imóvel criado com sucesso!');
    }


    /* read all ----- (/customers) ----- GET */
    public function index(){
        $properties = Property::with('customer')->get()->sortBy(['status', 'address']);
        $customers = Customer::all();
        return view('properties.index', compact('properties', 'customers'));
    }


    /* read ----- (/customers/{id}) ----- GET */
    public function show(Property $property){
        $customers = Customer::all();
        return view('properties.show', compact('property', 'customers'));
    }


    /* update ----- (/customers/{id}/edit) ----- GET */
    public function edit(Property $property){
        $customers = Customer::all();
        return view('properties.edit', compact('property', 'customers'));
    }


    /* update ----- (/customers/{id}) ----- PUT/PATCH */
    public function update(Request $request, Property $property){
        $request->validate($this->validate);

        $property->update($request->all());

        return redirect()->route('properties.show', $property)->with('success', 'Imóvel atualizado com sucesso!');
    }

    
    /* delete ----- (/customers/{id}) ----- DESTROY */
    public function destroy(Property $property){
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Imóvel excluído com sucesso!');
    }
    
}
