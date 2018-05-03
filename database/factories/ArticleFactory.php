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

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description'=> $faker->sentence(10),
        'content' => $faker->text(500),
        'date_time' => $faker->date('Y-m-d'),
        'user_id'=> function () {
            return App\User::where('author', '=', 'Y')->get()->random();
        }
    ];
});
