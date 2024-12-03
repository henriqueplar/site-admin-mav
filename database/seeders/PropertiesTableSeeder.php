<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([
            [
                'address' => 'Rua das Flores, 123, São Paulo, SP',
                'status' => 'Disponível',
                'customer_id' => 6, // ID fictício da tabela clients
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'address' => 'Avenida Paulista, 456, São Paulo, SP',
                'status' => 'Vendido',
                'customer_id' => 7, // ID fictício da tabela clients
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'address' => 'Rua dos Girassóis, 789, Belo Horizonte, MG',
                'status' => 'Alugado',
                'customer_id' => 8, // ID fictício da tabela clients
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'address' => 'Rua 7 de Setembro, 101, Porto Alegre, RS',
                'status' => 'Disponível',
                'customer_id' => 9, // ID fictício da tabela clients
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'address' => 'Praça da Liberdade, 22, Rio de Janeiro, RJ',
                'status' => 'Reservado',
                'customer_id' => 10, // ID fictício da tabela clients
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
