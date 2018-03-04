<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\UserModel::class, function (Faker $faker) {
  $faker = \Faker\Factory::create('fr_FR');

  return [
    'firstname' => $faker->firstName,
    'lastname' => $faker->lastName,
    'email' => $faker->unique()->safeEmail,
    'phone' => $faker->unique()->mobileNumber,
    'password' => $faker->password,
    'created_at' => $faker->dateTime(),
    'updated_at' => $faker->dateTime()
  ];
});