<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'type' => 'Pessoa Física',
                'document' => '123.456.789-00',
                'name' => 'Carlos da Silva',
                'birth' => '1985-03-15',
                'phone' => '(11) 98765-4321',
                'email' => 'carlos.silva@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Pessoa Jurídica',
                'document' => '12.345.678/0001-90',
                'name' => 'Tech Solutions LTDA',
                'birth' => '1985-03-15',
                'phone' => '(21) 91234-5678',
                'email' => 'contato@techsolutions.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Pessoa Física',
                'document' => '987.654.321-99',
                'name' => 'Maria Oliveira',
                'birth' => '1990-07-22',
                'phone' => '(31) 99876-5432',
                'email' => 'maria.oliveira@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Pessoa Jurídica',
                'document' => '98.765.432/0001-12',
                'name' => 'Pilarize Corp',
                'birth' => '1985-03-15',
                'phone' => '(51) 94567-1234',
                'email' => 'admin@pilarizecorp.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Pessoa Física',
                'document' => '456.789.123-66',
                'name' => 'João Pereira',
                'birth' => '1978-11-10',
                'phone' => '(85) 97654-3210',
                'email' => 'joao.pereira@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
