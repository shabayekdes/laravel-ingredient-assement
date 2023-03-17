<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Storage;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $ingredients = Ingredient::when($request->has('search'), function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })
            ->latest()
            ->paginate();

        return view('ingredients.index', [
            'ingredients' => $ingredients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Redirector
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'quantity' => 'required',
        ]);

        Ingredient::create($validated);
        return redirect(route('ingredients.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ingredient $ingredient
     * @return Application|Factory|View
     */
    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', [
            'ingredient' => $ingredient
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Ingredient $ingredient
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'quantity' => 'required',
        ]);

        $ingredient->update($validated);
        return redirect(route('ingredients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ingredient $ingredient
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect(route('ingredients.index'));
    }
}
