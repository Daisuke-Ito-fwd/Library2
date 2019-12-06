<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Library;
use Faker\Generator as Faker;

$factory->define(Library::class, function (Faker $faker) {
    return [
            'id' =>0,
            'auth' => $faker->name,
            'kana' => $faker->kanaName,
            'isbn' =>$faker->isbn13,
            'publ'=>$faker->numberBetween(1, 10),
            'genre'=>$faker->numberBetween(1, 10),
            'title'=>$faker->streetAddress,
            's_date'=>now(),
            'stock' =>$faker->numberBetween(1, 10),
    ];
});
