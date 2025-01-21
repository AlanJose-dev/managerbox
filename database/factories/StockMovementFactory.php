<?php

namespace Database\Factories;

use App\Enums\Models\StockMovementTypeEnum;
use App\Models\Company;
use App\Models\ItemInStock;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockMovement>
 */
class StockMovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movement_type' => fake()->randomElement(collect(StockMovementTypeEnum::cases())
                ->pluck('value')->toArray()),
            'quantity' => fake()->randomFloat(2),
            'observations' => fake()->text(),
            'item_in_stock_id' => ItemInStock::factory(),
            'company_id' => Company::factory(),
            'user_id' => User::factory(),
            'supplier_id' => Supplier::factory(),
        ];
    }
}
