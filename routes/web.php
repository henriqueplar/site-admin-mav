<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractLineController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\InstallmentLineController;
use App\Http\Controllers\PropertyController;
use App\Models\Contract;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('customers');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        /* return view('dashboard'); */
        return redirect('customers');
    })->name('dashboard');

    Route::resource('customers', CustomerController::class);

    Route::resource('agents', AgentController::class);

    Route::resource('properties', PropertyController::class);

    Route::resource('contracts', ContractController::class);

    Route::resource('contract-lines', ContractLineController::class);

    Route::resource('installments', InstallmentController::class);

    Route::resource('installment-lines', InstallmentLineController::class);

    Route::post('/contracts/{contract}/generate', [InstallmentController::class, 'generateInstallments'])->name('installments.generate');

    /* Route::post('/installments/{installment}/habilitar', [InstallmentController::class, 'getBolecode'])->name('installments.habilitar'); */
});
