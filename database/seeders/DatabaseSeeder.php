<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company; // Assumindo que você tem um modelo Company
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ... outras seeds

        $company = Company::firstOrCreate([
            'name' => 'Empresa Exemplo',
        ]); // Crie ou obtenha a empresa

        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('secret'),
            'company_id' => $company->id, // Informe o ID da empresa
            'updated_at' => now(),
            'created_at' => now(),
            'cnpj' => '12345678901234',
        ]);
    }
}
