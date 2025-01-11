<?php

namespace App\Observers;

use App\Http\Controllers\ContractController;
use App\Models\Contract;

class ContractObserver{

    private $contractController;

    public function __construct(ContractController $contractController)
    {
        $this->contractController = $contractController;
    }

    public function updated(Contract $contract){
        if ($contract->isDirty('start_date') || $contract->isDirty('end_date')) {
            $this->contractController->calculateAmount($contract);
        }
    }
}