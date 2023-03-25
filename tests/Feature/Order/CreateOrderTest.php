<?php

namespace Tests\Feature\Order;

use App\Mail\AlertOrderQuantityMail;
use App\Models\Ingredient;
use App\Models\IngredientProduct;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_alert_email_sent_with_create_order_successful()
    {
        Mail::fake();

        //seed data
        $product = Product::factory()->create();
        $ingredient = Ingredient::factory()->create(['quantity' => 60]);

        IngredientProduct::factory()->create(['product_id' => $product->id, 'quantity' => 40]);

        // send request
        $response = $this->post('api/orders', [
            'products' => [
                [
                    'product_id' => $product->id,
                    'quantity' => 2
                ]
            ]
        ])->json();
       Mail::assertSent(AlertOrderQuantityMail::class, 1);
       Mail::assertSent(AlertOrderQuantityMail::class, function ($mail) use ($ingredient) {
            return $mail->hasSubject("Alert: Ingredient {$ingredient->first()->name} Usage Exceeded 50%");
        });
    }
    public function test_create_order_successful()
    {
        //seed data
        $product = Product::factory()->create();
        $ingredient = Ingredient::factory(3)->create();

        IngredientProduct::factory(3)->create(['product_id' => $product->id]);

        // send request
        $response = $this->post('api/orders', [
            'products' => [
                [
                    'product_id' => $product->id,
                    'quantity' => 2
                ]
            ]
        ])->json();

        //asserts
        $this->assertTrue($response['success']);
    }
    public function test_create_order_failed_with_validation_quantity_required()
    {
        // $this->handleValidationExceptions();

        //seed data
        $product = Product::factory()->create();
        $ingredient = Ingredient::factory(3)->create();

        IngredientProduct::factory(3)->create(['product_id' => $product->id]);

        // send request
        $response = $this->post('api/orders', [
            'products' => [
                [
                    'product_id' => $product->id,
                    // 'quantity' => 2
                ]
            ]
        ]);

        $response->assertStatus(Response::HTTP_FOUND);
        $response->assertValid(['products.0.product_id']);
        $response->assertInvalid(['products.0.quantity']);

        // $response->assertSessionHasErrors(['products.0.quantity']);
    }

}
