<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        //'subject', 'message', 'date',
        'subject' =>  $faker->randomElement(['Quiz', 'Score', 'Other']),
        'message' => $faker->text,
        'user_id' => rand(1,20),
        'picture' => 'none',
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
