<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'author' => $faker->name,
        'edition' => $faker->randomNumber(1),
        'length' => $faker->numberBetween(100, 2900),
        'score' => $faker->numberBetween(1, 100),
        'cover' => $faker->imageUrl(),
        'file' => $faker->imageUrl(),
        'published_date' => $faker->dateTime()
    ];
});
