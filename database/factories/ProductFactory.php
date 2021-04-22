<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'        => $faker->word,
        'description' => $faker->sentence,
        'price'       => $faker->randomFloat(2, 1, 100),
        'category_id' => $faker->randomElement(App\Models\Category::all()->pluck('id')->toArray()),
        'make'        => $faker->year,
        'image'       => 'public/storage/products/dummyproduct.jpg',
        'quantity'    => 10,
        'featured'    => array_rand([0, 1])
    ];
});
