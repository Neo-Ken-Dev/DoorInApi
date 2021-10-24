<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Immeuble::class, function (Faker $faker) {
    return [
        'nb_residents' => $faker->numberBetween(0,100),
        'nb_flats' => $faker->numberBetween(0,10),
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'zip_code' => $faker->postcode                            ,
    ];
});
