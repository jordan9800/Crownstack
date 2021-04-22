<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type' => array_rand(['mirrorless', 'full frame', 'point and shoot']),
        'year' => $faker->year,
        
    ];
});
