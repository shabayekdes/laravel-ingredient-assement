<?php

namespace Tests\Feature\Ingredient;

use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IngredientCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create());
    }
    /**
     * Fetch list ingredients successful.
     */
    public function test_fetch_list_ingredients_successful(): void
    {
        // seed data
        Ingredient::factory(10)->create();

        // call api
        $this->get(route('ingredients.index'));

        // assert
        $ingredients = Ingredient::all();
        $this->assertCount(10, $ingredients);
    }
    /**
     * Create a new ingredient successful.
     */
    public function test_create_ingredients_successful(): void
    {
        // seed data
        $data = Ingredient::factory()->make()->toArray();

        // call api
        $this->post(route('ingredients.store'), $data);

        // assert
        $ingredients = Ingredient::all();
        $this->assertCount(1, $ingredients);
        $this->assertEquals($ingredients->first()->name, $data['name']);
    }

    /**
     * Update a ingredient successful.
     */
    public function test_update_ingredients_successful(): void
    {
        // seed data
        $ingredient = Ingredient::factory()->create();
        $data = Ingredient::factory()->make()->toArray();

        // call api
        $this->put(route('ingredients.update', $ingredient), $data);

        // assert
        $ingredient->refresh();
        $this->assertEquals($ingredient->name, $data['name']);
    }
    /**
     * Delete a ingredient successful.
     */
    public function test_delete_ingredients_successful(): void
    {
        // seed data
        $ingredient = Ingredient::factory()->create();

        // call api
        $this->delete(route('ingredients.destroy', $ingredient));

        // assert
        $this->assertDatabaseEmpty('ingredients');
    }
}
