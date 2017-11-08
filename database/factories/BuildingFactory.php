<?php

use Faker\Generator as Faker;
use Faker\Factory as Factory;

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

$factory->define(App\Building::class, function (Faker $faker) {
    $faker = Factory::create('zh_CN');

    return [
        'name' => $faker->word,
        'nickname' => $faker->name,
    ];
});
