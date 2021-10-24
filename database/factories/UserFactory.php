<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

/* @var  $factory \Illuminate\Database\Eloquent\Factory */
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'account_id' => function () {
            return factory(App\Account::class)->create()->id;
        },
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'email_verified_at' => $faker->dateTime(),
        'password' => bcrypt($faker->password),
        'remember_token' => Str::random(10),
    ];
});
