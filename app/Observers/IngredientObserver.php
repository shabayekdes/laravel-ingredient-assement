<?php

namespace App\Observers;

use App\Mail\AlertOrderQuantityMail;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Mail;

class IngredientObserver
{
    /**
     * Handle the Ingredient "updated" event.
     */
    public function updated(Ingredient $ingredient): void
    {
        $qty = $ingredient->quantity * 0.5;
        if ($ingredient->isDirty('order_quantity') && $qty <= $ingredient->order_quantity) {
            Mail::to('esmail.shabayek@gmail.com')->send(new AlertOrderQuantityMail($ingredient));
            dump('ddd');
            $ingredient->update(['order_quantity' => 0]);
        }
    }
}
