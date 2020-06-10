<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        //'subject_id', 'question', 'ans_a', 'ans_b', 'ans_c', 'ans_d', 'answer' ,'level'
        'subject_id' => rand(1,3),
        'question' => $faker->text,
        'ans_a' => $faker->title,
        'ans_b' => $faker->title,
        'ans_c' => $faker->title,
        'ans_d' => $faker->title,
        'answer' => $faker->title,
        'level' => rand(1,5),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime

    ];
});
