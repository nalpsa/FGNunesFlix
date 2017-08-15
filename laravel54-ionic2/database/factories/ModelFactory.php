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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\FGNunesFlix\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->state(\FGNunesFlix\Models\User::class,'admin',function (Faker\Generator $faker) {

    return [
        'role' => \FGNunesFlix\Models\User::ROLE_ADMIN,
    ];
});

$factory->define(\FGNunesFlix\Models\Category::class, function (Faker\Generator $faker){
   return [
     'name' => $faker->word
   ];
});

$factory->define(\FGNunesFlix\Models\Serie::class, function (Faker\Generator $faker){
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->sentence(10),
        'thumb' => 'thumb.jpg'
    ];
});

$factory->define(\FGNunesFlix\Models\Video::class, function (Faker\Generator $faker){
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->sentence(10),
        'duration' => rand(1,30),
        'file' => 'file.jpg',
        'thumb' => 'thumb.jpg',
        'published' => rand(0,1),
        'completed' => 1
    ];
});

























