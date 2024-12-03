<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agents')->insert([
            [
                'name' => 'Ana Paula Ferreira',
                'email' => 'ana.ferreira@imoveis.com',
                'creci' => '12345-SP',
                'status' => 'Ativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carlos Eduardo Mendes',
                'email' => 'carlos.mendes@corretores.com',
                'creci' => '67890-RJ',
                'status' => 'Ativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mariana Silva',
                'email' => 'mariana.silva@vendasimoveis.com',
                'creci' => '11223-MG',
                'status' => 'Inativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'José Augusto Pereira',
                'email' => 'jose.pereira@consultores.com',
                'creci' => '44556-PR',
                'status' => 'Ativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luciana Alves',
                'email' => 'luciana.alves@imobiliaria.com',
                'creci' => '78901-SP',
                'status' => 'Inativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
