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

$factory->define(App\Resource::class, function (Faker $faker) {
    $map = \App\Map::find($_COOKIE['time']*5);
    $map->userId = $_COOKIE['time'];
    $map->save();
    $mapArray = \App\Services\InitService::TERRAIN_NAME_AREA;

    return [
        'userId' => $_COOKIE['time'],
        'mapId' => $map->id,
        'area' => $mapArray[$map->terrain],
        'areaVoid' => $mapArray[$map->terrain],
//        'peopleDepot' => $mapArray[$map->terrain],
    ];
});
