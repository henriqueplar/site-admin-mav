<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('installments')->insert([
            [
                'dueDate' => '2024-12-10',
                'number' => 1,
                'contract_id' => 6, // ID fictício da tabela contracts
                'amount' => 500.00,
                'status' => 'Pendente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dueDate' => '2025-01-10',
                'number' => 2,
                'contract_id' => 7,
                'amount' => 500.00,
                'status' => 'Pendente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dueDate' => '2025-02-10',
                'number' => 3,
                'contract_id' => 8,
                'amount' => 500.00,
                'status' => 'Paga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dueDate' => '2024-12-15',
                'number' => 1,
                'contract_id' => 9, // ID fictício da tabela contracts
                'amount' => 125000.00,
                'status' => 'Pendente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dueDate' => '2025-06-15',
                'number' => 2,
                'contract_id' => 10,
                'amount' => 125000.00,
                'status' => 'Pendente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
