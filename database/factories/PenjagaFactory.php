<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Penjaga::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\en_US\PhoneNumber($faker));
    return [
        "nama_penjaga" => $faker->name,
        "nomor_handphone" => $faker->e164PhoneNumber,
    ];
});
