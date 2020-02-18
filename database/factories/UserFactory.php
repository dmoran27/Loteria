<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [


            'telefono1' => $faker->phoneNumber,
            'telefono2' => $faker->phoneNumber,
            'email' => $faker->unique()->safeEmail,
            'password' => Hash::make('admin'),
            'direccion' => 'Calle principal',
            'pais'=>$faker->city,
            'estado'=>$faker->city,
            'municipio'=>$faker->city,
            'parroquia'=>$faker->city,
    ];
});
