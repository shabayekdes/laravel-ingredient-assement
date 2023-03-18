<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientProduct;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // IngredientProduct::factory(100)->create();

        IngredientProduct::create([
            'product_id' => Product::first()->id,
            'ingredient_id' => Ingredient::where('name', 'Beef')->first()->id,
            'quantity' => 150
        ]);
        IngredientProduct::create([
            'product_id' => Product::first()->id,
            'ingredient_id' => Ingredient::where('name', 'Cheese')->first()->id,
            'quantity' => 30
        ]);
        IngredientProduct::create([
            'product_id' => Product::first()->id,
            'ingredient_id' => Ingredient::where('name', 'Onion')->first()->id,
            'quantity' => 20
        ]);
    }
}
