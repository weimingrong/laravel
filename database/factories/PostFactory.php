<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'published_at' => \Carbon\carbon::now(),
        'author_id' => 1
    ];
});
