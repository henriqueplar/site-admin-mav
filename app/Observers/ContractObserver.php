<?php

namespace App\Observers;

use App\Models\Contract;

class ContractObserver
{
    public function updated(Contract $contract)
    {
        // Verifica se as datas de início ou término foram alteradas
        if ($contract->isDirty('start_date') || $contract->isDirty('end_date')) {
            $this->recalculateContractValue($contract);
        }
    }

    private function recalculateContractValue($contract)
    {
        // ... (mesma lógica da função recalculateContractValue do ContractLineObserver) ...
    }
}