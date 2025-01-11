<?php

namespace App\Http\Controllers;

use App\Models\InstallmentLine;
use Illuminate\Http\Request;

class InstallmentLineController extends Controller
{
    private $validate = [
        'installment_id' => 'required|exists:installments,id',
        'description' => 'nullable|string',
        'value' => 'required|numeric',
    ];

    /* create ----- (/customers/create) ----- GET */
    public function create(){
        return view('installment-lines.create');
    }

    /* create ----- (/customers) ----- POST */
    public function store(Request $request){
        $request->validate($this->validate);

        $installmentLine = InstallmentLine::create($request->all());

        return redirect()->route('installments.show', $installmentLine->installment)/* ->with('success', '') */;
    }


    /* read all ----- (/customers) ----- GET */
    public function index(){
        return view('installments.index');
    }


    /* read ----- (/customers/{id}) ----- GET */
    public function show(InstallmentLine $installmentLine){
        return view('installments.show', compact('installmentLine'));
    }


    /* update ----- (/customers/{id}/edit) ----- GET */
    public function edit(InstallmentLine $installmentLine){
        return view('installments.edit', compact('installment'));
    }


    /* update ----- (/customers/{id}) ----- PUT/PATCH */
    public function update(Request $request, InstallmentLine $installmentLine){
        $request->validate($this->validate);

        $installmentLine->update($request->all());

        return redirect()->route('installments.show', $installmentLine->installment)/* ->with('success', '') */;
    }

    
    /* delete ----- (/customers/{id}) ----- DESTROY */
    public function destroy(InstallmentLine $installmentLine){
        $installment = $installmentLine->installment;  
        $installmentLine->delete();

        return redirect()->route('installments.show', compact('installment'))/* ->with('success', 'Parcela excluída com sucesso!') */;
    }



    //OTHERS --------------------

    
}
