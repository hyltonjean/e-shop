<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
  $name = ucfirst($faker->word(2));
  return [
    'name' => $name,
    'slug' => Str::slug($name),
    'description' => $faker->paragraph(4),
    'price' => $faker->numberBetween(100, 10000),
    'image' => 'uploads/products/book.png',
  ];
});
