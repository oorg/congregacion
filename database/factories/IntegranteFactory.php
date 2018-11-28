<?php

use Faker\Generator as Faker;

$factory->define(App\Integrante::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'edad' => $faker->randomNumber(2),
        'telefono' => $faker->tollFreePhoneNumber,
    ];
});
