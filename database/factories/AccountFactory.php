<?php

use Faker\Generator as Faker;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\Account::class, function (Faker $faker) {
    return [
        'city' => $faker->city,
        'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d')
    ];
});
