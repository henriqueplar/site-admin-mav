<?php

namespace App\Observers;

use App\Http\Controllers\InstallmentController;
use App\Models\InstallmentLine;

class InstallmentLineObserver
{
   private $installmentController;

    public function __construct(InstallmentController $installmentController)
    {
        $this->installmentController = $installmentController;
    }

    public function created(InstallmentLine $installmentLine){
        $this->installmentController->calculateAmount($installmentLine->installment);
    }

    public function updated(InstallmentLine $installmentLine){
        $this->installmentController->calculateAmount($installmentLine->installment);
    }

    public function deleted(InstallmentLine $installmentLine){
        $this->installmentController->calculateAmount($installmentLine->installment);
    }
}
