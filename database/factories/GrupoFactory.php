<?php

use Faker\Generator as Faker;

$factory->define(App\Grupo::class, function (Faker $faker) {
    return [
        'nombre' => str_random(5),
    ];
});
