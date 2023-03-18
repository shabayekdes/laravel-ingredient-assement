<?php

namespace App\Jobs;

use App\Models\Ingredient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class IncrementOrderQuantity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $product;
    private $quantity;

    /**
     * Create a new event instance.
     */
    public function __construct($product, $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->product->ingredientProducts as $ingredient) {
            Ingredient::where('id', $ingredient->ingredient_id)->increment('order_quantity', $ingredient->quantity * $this->quantity);
        }
    }
}
