<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractLineController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('customers', CustomerController::class);

    Route::resource('agents', AgentController::class);

    Route::resource('properties', PropertyController::class);

    Route::resource('contracts', ContractController::class);

    Route::resource('contract-lines', ContractLineController::class);

    Route::resource('installments', InstallmentController::class);
});
