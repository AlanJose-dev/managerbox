<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Company;
use App\Models\Metier;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory(20)->create([
            'metier_id' => fake()->randomElement(Metier::inRandomOrder()->pluck('id')->toArray()),
        ])->each(function ($company) {

            Address::factory()->create([
                'addressable_type' => Company::class,
                'addressable_id' => $company->id,
            ]);

            //Criando administrador.
            User::factory()->create([
                'company_id' => $company->id,
            ])->each(function ($user, $company) {
                $user->assignRole('administrator');

                Address::factory()->create([
                    'addressable_type' => User::class,
                    'addressable_id' => $user->id,
                ]);

                //Criando fornecedor.
                Supplier::factory(2)->create([
                    'company_id' => $company->id,
                    'user_id' => $user->id,
                ])->each(function ($supplier) {
                    $supplier->assignRole('supplier');
                    Address::factory()->create([
                        'addressable_type' => Supplier::class,
                        'addressable_id' => $supplier->id,
                    ]);
                });
            });

            //Criando gerentes de estoque.
            User::factory(5)->create([
                'company_id' => $company->id,
            ])->each(function ($user) {
                $user->assignRole('stock_manager');
                Address::factory()->create([
                    'addressable_type' => User::class,
                    'addressable_id' => $user->id,
                ]);
            });

            //Criando operadores de estoque.
            User::factory(10)->create([
                'company_id' => $company->id,
            ])->each(function ($user) {
                $user->assignRole('stock_operator');
                Address::factory()->create([
                    'addressable_type' => User::class,
                    'addressable_id' => $user->id,
                ]);
            });

            //Criando gerentes financeiros.
            User::factory(10)->create([
                'company_id' => $company->id,
            ])->each(function ($user) {
                $user->assignRole('financial_manager');
                Address::factory()->create([
                    'addressable_type' => User::class,
                    'addressable_id' => $user->id,
                ]);
            });

            //Criando auditor.
            User::factory()->create([
                'company_id' => $company->id,
            ])->each(function ($user) {
                $user->assignRole('auditor');
                Address::factory()->create([
                    'addressable_type' => User::class,
                    'addressable_id' => $user->id,
                ]);
            });

        });
    }
}
