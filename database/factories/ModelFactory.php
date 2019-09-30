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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'isActive' => true,
        'discriminator' => 'office',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'
    ];
});

$factory->define(App\Office::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'dba' => $faker->randomNumber($nbDigits = 4),
        'phone' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'ein' => $faker->randomNumber($nbDigits = 6),
        'address' => $faker->address,
        'cityId' => function () {
            return \App\City::all()->random()->id;
        },
        'zip' => $faker->randomNumber($nbDigits = 5)
    ];
});
