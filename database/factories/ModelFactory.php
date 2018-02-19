<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->sentence(),
        'body' => $faker->text(),
        'status' => 'PUBLISHED',
    ];
});

$factory->define(App\Asset::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'size' => $faker->name,
        'type' => $faker->name,
        'url' => $faker->url(),
        'thumbnail_url' => $faker->url(),
        'width' => 200,
        'height' => 200,
    ];
});

$factory->define(App\Color::class, function (Faker\Generator $faker) {
    return [
        'color' => $faker->colorName,
        'product_id' => 1,
    ];
});

$factory->define(App\Type::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'category_id' => 1,
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'type_id' => 1,
        'title' => $faker->name,
        'description' => $faker->sentence(),
        'price' => $faker->randomDigit,
        'old_pice' => $faker->randomDigit,
        'body' => $faker->text(),

    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
    ];
});

$factory->define(App\Characteristic::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'value' => $faker->sentence(),
    ];
});

$factory->define(App\Widget::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->sentence(),
    ];
});
