<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Transaction::class, function (Faker\Generator $faker) {
    return [
        'commission_fee' => $faker->randomFloat(2, 0, 10),
        'requested_amount' => $faker->randomFloat(2, 0, 10),
        'total_balance' => $faker->randomFloat(2, 0, 10),
        'currency' => $faker->currencyCode,
        'type' => $faker->randomElement(['deposit', 'withdraw']),
        'created_at'=>now(),
        'updated_at' => now()
    ];
});
