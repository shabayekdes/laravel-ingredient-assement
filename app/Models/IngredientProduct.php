<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class IngredientProduct extends Pivot
{
    use HasFactory;

    public function quantityLabel(): Attribute
    {
        return Attribute::make(
            get: fn($value) => (string) $this->attributes['quantity'] > 1000 ? ($this->attributes['quantity'] / 1000) . 'Kg': $this->attributes['quantity'] . 'g',
        );
    }
}
