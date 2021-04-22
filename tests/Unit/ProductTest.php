<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Category;
use App\Models\Product;

class ProductTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp() :void
    {
        parent::setUp();
    }

    public function test_to_get_all_products_according_to_a_category()
    {
        $category = factory(Category::class)->create();

        $product = factory(Product::class)->create([
                        'category_id' => $category->id
                   ]);

        $url = "api/categories/{$category->id}";

        $response = $this->json('GET', $url);

        $response->assertStatus(200);
    }

    public function test_to_get_all_products()
    {
        $url = "api/products";

        $response = $this->json('GET', $url);

        $response->assertStatus(200);

        $productsCountFromRequest = count($response->json());

        $productsCountFromDb = Product::count();

        $this->assertEquals($productsCountFromDb, $productsCountFromRequest);
    }

}