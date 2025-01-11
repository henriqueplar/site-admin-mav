<?php

namespace App\Observers;

use App\Http\Controllers\ContractController;
use App\Models\ContractLine;

class ContractLineObserver
{
    private $contractController;

    public function __construct(ContractController $contractController)
    {
        $this->contractController = $contractController;
    }

    public function created(ContractLine $contractLine){
        $this->contractController->calculateAmount($contractLine->contract);
    }

    public function updated(ContractLine $contractLine){
        $this->contractController->calculateAmount($contractLine->contract);
    }

    public function deleted(ContractLine $contractLine){
        $this->contractController->calculateAmount($contractLine->contract);
    }

}
