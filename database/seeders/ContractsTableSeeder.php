<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contracts')->insert([
            [
                'validity' => 12,
                'property_id' => 6, // ID fictício da tabela properties
                'customer_id' => 6, // ID fictício da tabela clients
                'agent_id' => 13,    // ID fictício da tabela agents
                'amount' => 1500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validity' => 12,
                'property_id' => 7, // ID fictício da tabela properties
                'customer_id' => 7, // ID fictício da tabela clients
                'agent_id' => 12,    // ID fictício da tabela agents
                'amount' => 250000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validity' => 12,
                'property_id' => 8, // ID fictício da tabela properties
                'customer_id' => 8, // ID fictício da tabela clients
                'agent_id' => 11,    // ID fictício da tabela agents
                'amount' => 2000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validity' => 12,
                'property_id' => 9, // ID fictício da tabela properties
                'customer_id' => 9, // ID fictício da tabela clients
                'agent_id' => 10,    // ID fictício da tabela agents
                'amount' => 180000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validity' => 12,
                'property_id' => 10, // ID fictício da tabela properties
                'customer_id' => 10, // ID fictício da tabela clients
                'agent_id' => 9,    // ID fictício da tabela agents
                'amount' => 3500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
