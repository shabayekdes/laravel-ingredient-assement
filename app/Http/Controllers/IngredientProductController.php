<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\IngredientProduct;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class IngredientProductController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Product $product
     * @return Redirector
     */
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'ingredient_id' => 'required',
            'quantity' => 'required',
        ]);
        $validated['product_id'] = $product->id;

        IngredientProduct::create($validated);
        return redirect(route('products.show', $product));
    }
}
