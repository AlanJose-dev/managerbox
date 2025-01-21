<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory(100)->create()->each(function ($company) {

            User::factory(49)->create([
                'company_id' => $company->id,
                'is_responsible_by_company' => false,
            ]);

            User::factory()->create([
                'company_id' => $company->id,
                'is_responsible_by_company' => true,
            ]);
        });
    }
}
