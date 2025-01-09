<?php

namespace App\Observers;

use App\Models\ContractLine;
use App\Models\Installment;
use Carbon\Carbon;

class ContractLineObserver
{
    public function created(ContractLine $contractLine)
    {
        $this->recalculateContractValue($contractLine->contract);
    }

    public function updated(ContractLine $contractLine)
    {
        $this->recalculateContractValue($contractLine->contract);
    }

    public function deleted(ContractLine $contractLine)
    {
        $this->recalculateContractValue($contractLine->contract);
    }

    private function recalculateContractValue($contract)
    {
        $totalValue = 0;
        $contractDurationMonths = $this->getContractDurationMonths($contract->start_date, $contract->end_date);

        // Gera as novas parcelas com base na duração do contrato
        $newInstallments = [];
        for ($i = 1; $i <= $contractDurationMonths; $i++) {
            $installment = new Installment([
                'contract_id' => $contract->id,
                'number' => $i,
                'due_date' => Carbon::parse($contract->start_date)->addMonths($i - 1),
                'amount' => 0,
            ]);
            $newInstallments[] = $installment;
        }
        $newInstallments = collect($newInstallments);

        // Pega as parcelas existentes
        $existingInstallments = $contract->installments;

        // Compara as novas parcelas com as existentes
        if (
            $newInstallments->count() != $existingInstallments->count() ||
            !$newInstallments->every(function ($newInstallment) use ($existingInstallments) {
                $existing = $existingInstallments->firstWhere('number', $newInstallment->number);
                return $existing && $existing->amount == $newInstallment->amount;
            })
        ) {
            foreach ($existingInstallments as $existingInstallment) {
                $found = false;
                foreach ($newInstallments as $newInstallment) {
                    if ($newInstallment->number === $existingInstallment->number) {
                        $found = true;
                        if ($existingInstallment->status !== 'pago') {
                            if ($newInstallment->amount != $existingInstallment->amount) {
                                $existingInstallment->amount = $newInstallment->amount;
                                $existingInstallment->save();
                            }
                        }
                        break;
                    }
                }
                if (!$found && $existingInstallment->status !== 'pago') {
                    $existingInstallment->delete();
                }
            }

            // Adiciona as novas parcelas que não existem nas existentes
            foreach ($newInstallments as $newInstallment) {
                if (!$existingInstallments->contains('number', $newInstallment->number)) {
                    $newInstallment->save();
                }
            }
        }

        // ... (lógica para calcular o valor das linhas e adicionar às parcelas) ...

        foreach ($contract->lines as $line) {
            $lineValue = $line->value_type === 'valor cheio' ? $line->value : ($contract->getOriginal('amount') * $line->percentage / 100);

            if ($line->payment_frequency === 'mensal') {
                // Divide o valor da linha pelo número de parcelas
                $installmentValue = $lineValue / $contractDurationMonths;

                // Adiciona o valor da linha a cada parcela
                foreach ($contract->installments as $installment) {
                    $installment->amount += $installmentValue;
                    $installment->save();
                }
            } else if ($line->payment_frequency === 'anual') {
                // Calcula o mês de vencimento da parcela anual (considerando o mês de início do contrato)
                $startMonth = Carbon::parse($contract->start_date)->month;
                $lineMonth = Carbon::parse($line->created_at)->month;
                $month = ($lineMonth - $startMonth + 12) % 12 + 1; // Ajusta o mês para o intervalo de 1 a 12

                // Adiciona o valor da linha à parcela correspondente ao mês de vencimento
                $installment = $contract->installments->firstWhere('due_date', 'like', '%' . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-%');
                if ($installment) {
                    $installment->amount += $lineValue;
                    $installment->save();
                }
            }

            // Adiciona o valor da linha ao total do contrato
            $totalValue += $lineValue * ($line->payment_frequency === 'mensal' ? $contractDurationMonths : 1);
        }
    }

    private function getContractDurationMonths($startDate, $endDate)
    {
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);
        return $startDate->diffInMonths($endDate);
    }
}
