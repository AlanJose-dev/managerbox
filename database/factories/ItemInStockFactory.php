<?php

namespace Database\Factories;

use App\Enums\Models\ItemInStockUnityTypeEnum;
use App\Models\ItemInStockCategory;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemInStock>
 */
class ItemInStockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sku_code' => Str::random(fake()->randomElement([12, 20])),
            'barcode' => Str::random(50),
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'unity_type' => fake()->randomElement(collect(ItemInStockUnityTypeEnum::cases())
            ->pluck('value')->toArray()),
            'current_quantity' => fake()->randomFloat(2),
            'minimum_quantity' => fake()->randomFloat(2),
            'brand' => fake()->word(),
            'cost_price' => fake()->randomFloat(2),
            'sell_price' => fake()->randomFloat(2),
            'location' => fake()->text(),
            'user_id' => User::factory(),
            'category_id' => ItemInStockCategory::factory(),
            'supplier_id' => Supplier::factory(),
        ];
    }
}
