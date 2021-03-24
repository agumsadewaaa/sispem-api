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

$factory->define(App\User::class, function (Faker $faker) {
    // dd($faker);
    $faker->addProvider(new \Faker\Provider\Base($faker));
    $roleUser = App\Role::where('role', 'user')->first()->id;
    return [
        'name' => $faker->name,
        'nip_nim' => $faker->unique()->numberBetween(1311521045, 1311522999),//rand(1311521001, 1311523030),
        'role_id' => $roleUser,
        'status' => 1,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
