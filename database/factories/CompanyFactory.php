<?php

namespace Database\Factories;

use App\Models\Metier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyFaker = new \Faker\Provider\pt_BR\Company(fake());
        return [
            'name' => $companyFaker->company(),
            'cnpj' => $companyFaker->cnpj(false),
            'state_registration' => fake()->randomNumber(9),
            'phone_number' => Str::unformattedPhoneNumber(fake()->phoneNumber()),
            'contact_email' => fake()->unique()->email(),
            'foundation_date' => fake()->date(),
            'is_active' => fake()->boolean(),
            'metier_id' => Metier::factory(),
        ];
    }
}
