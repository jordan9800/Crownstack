<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Category;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp() :void
    {
        parent::setUp();
    }

    public function test_get_all_categories()
    {
        $url = "api/categories";

        $response = $this->json('GET', $url);

        $response->assertStatus(200);

        $categoriesCountFromRequest = count($response->json());

        $categoriesCountFromDb = Category::count();

        $this->assertEquals($categoriesCountFromDb, $categoriesCountFromRequest);
    }

    public function test_single_category()
    {
        $category = factory(Category::class)->create();

        $url = "api/categories/{$category->id}";

        $response = $this->json('GET', $url);

        $response->assertStatus(200);

        $latest = Category::latest();

        $this->assertEquals($latest->name, $category->name);
        $this->assertEquals($latest->type, $category->type);
        $this->assertEquals($latest->year, $category->year);
    }

}
