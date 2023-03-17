<?php

namespace Tests\Feature\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCrudTest extends TestCase
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
     * Fetch list products successful.
     */
    public function test_fetch_list_products_successful(): void
    {
        // seed data
        Product::factory(10)->create();

        // call api
        $this->get(route('products.index'));

        // assert
        $products = Product::all();
        $this->assertCount(10, $products);
    }
    /**
     * Create a new product successful.
     */
    public function test_create_products_successful(): void
    {
        // seed data
        $data = Product::factory()->make()->toArray();

        // call api
        $this->post(route('products.store'), $data);

        // assert
        $products = Product::all();
        $this->assertCount(1, $products);
        $this->assertEquals($products->first()->title, $data['title']);
    }

    /**
     * Update a product successful.
     */
    public function test_update_products_successful(): void
    {
        // seed data
        $product = Product::factory()->create();
        $data = Product::factory()->make()->toArray();

        // call api
        $this->put(route('products.update', $product), $data);

        // assert
        $product->refresh();
        $this->assertEquals($product->title, $data['title']);
    }
    /**
     * Update a product successful.
     */
    public function test_delete_products_successful(): void
    {
        // seed data
        $product = Product::factory()->create();

        // call api
        $this->delete(route('products.destroy', $product));

        // assert
        $this->assertDatabaseEmpty('products');
    }
}
