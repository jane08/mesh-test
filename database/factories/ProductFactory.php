<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
		'name' => $faker->name,
		'description' => $faker->text,
		'path' => '326084549.jpg',
    ];
});