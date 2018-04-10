<?php

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

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'date' => $faker->date(),
        'title' => $faker->sentence(3),
        'short_description' => $faker->text(),
        'text' => $faker->randomHtml(),
    ];
});
