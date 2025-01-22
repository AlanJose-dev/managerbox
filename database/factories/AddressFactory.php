<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'street' => fake()->streetName(),
            'number' => fake()->buildingNumber(),
            'complement' => fake()->text(),
            'neighborhood' => fake()->word(),
            'city' => fake()->city(),
            'state' => fake()->randomElement(Address::$brazilStates),
            'zipcode' => preg_replace('/\D/', '', fake()->postcode()),
            'country' => 'BR',
        ];
    }
}
