<?php

namespace Database\Seeders;

use App\Models\IngredientProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IngredientProduct::factory(100)->create();
    }
}
