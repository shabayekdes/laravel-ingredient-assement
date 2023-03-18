<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ingredient::factory(10)->create();

        Ingredient::create([
            'name' => 'Beef',
            'quantity' => 20000
        ]);
        Ingredient::create([
            'name' => 'Cheese',
            'quantity' => 5000
        ]);
        Ingredient::create([
            'name' => 'Onion',
            'quantity' => 1000
        ]);
    }
}
