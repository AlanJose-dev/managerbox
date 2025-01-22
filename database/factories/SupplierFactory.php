<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'cnpj' => fake()->unique()->cnpj(false),
            'cpf' => fake()->unique()->cpf(false),
            'email' => fake()->unique()->email(),
            'phone_number' => Str::unformattedPhoneNumber(fake()->phoneNumber()),
            'is_active' => fake()->boolean(),
            'company_id' => Company::factory(),
            'user_id' => User::factory()
        ];
    }
}
