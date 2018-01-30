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
| COMO UTILIZAR EN EL tinker
| php artisan tinker >>> factory(App\Message::class)->create()
*/

$factory->define(App\Message::class, function (Faker $faker){
    return [
        // retorna palabras al azar en formato texto (lorem ipsum)
        // 'content' => $faker->works(5, true)
        // retorna palabras en array (lorem ipsum)
        // 'content' => $faker->works(5)
        // retorna una sola palabra (lorem ipsum)
        // 'content' => $faker->work
        // retorna parrafos (lorem ipsum)
        // 'content' => $faker->paragrah
        // retorna texto basado en un libro (alicia en el pais de las maravillas)
        // 'content' => $faker->realText()
        'content' => $faker->realText(random_int(20, 160)),
        'image'   => $faker->imageUrl(600, 300),
        'created_at' => $faker->dateTimeThisDecade,
        'updated_at' => $faker->dateTimeThisDecade,
    ];
});

$factory->define(App\Response::class, function(Faker $faker){
    return [
        'message' => $faker->words(3, true),
        'created_at' => $faker->dateTimeThisYear,
        'updated_at' => $faker->dateTimeThisYear,
    ];
});