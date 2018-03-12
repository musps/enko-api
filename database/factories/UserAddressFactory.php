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
    'user' => 1,
    'tag' => 'default_address',
    'firstname' => $faker->firstName,
    'lastname' => $faker->lastName,
    'phone' => $faker->unique()->mobileNumber,
    'country' => 'FR'
    'street' => 'oui',
    'city' => 'oui',
    'state' => 'oui',
    'zipCode' => 'oui'
  ];
});