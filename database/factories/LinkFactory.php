<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Link;
use App\User;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'full_url' => $faker->url,
        'short_url' => $faker->url,
        'visits' => $faker->numberBetween(0,1000),
        'user_id' => $faker->numberBetween(1,User::count()),
    ];
});
