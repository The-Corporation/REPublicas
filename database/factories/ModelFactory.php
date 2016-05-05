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

$factory->define(Republicas\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'telephone'      => $faker->phoneNumber,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Republicas\Republic::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->word,
        'description'    => $faker->sentence,
        'telephone'      => $faker->phoneNumber,
        'address'        => $faker->address,
        'city'           => $faker->city,
        'state'          => $faker->state,
        'number_room'    => $faker->numberBetween(1,10),
        'room_detail'    => $faker->sentence,
    ];
});

$factory->define(Republicas\Bill::class, function (Faker\Generator $faker) {
    return [
        'name'      => $faker->word,
        'value'     => $faker->numberBetween(1, 500),
        'due_date'  => $faker->dateTime
    ];
});