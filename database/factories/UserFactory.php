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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'nickname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->numberBetween(110, 179) . $faker->numberBetween(1000, 9999) . $faker->numberBetween(1000, 9999),
        'password' => $password ?: $password = bcrypt('secret'),
        'gender' => $faker->numberBetween(0, 2),
        'countryId' => $faker->numberBetween(1, 3),
        'religionId' => $faker->numberBetween(1, 2),
        'remember_token' => str_random(10),
    ];
});
