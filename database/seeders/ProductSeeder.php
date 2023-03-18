<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::factory(50)->create();

        Product::create([
            'title' => 'Beef Burger',
            'price' => 150,
            'description' => 'Juicy, big, loaded with toppings of my choice.'
        ]);
    }
}
