<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
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
    static $password;

    return [
        'email'=> $faker->email,
        'email_verified_at'=> now(),
        'password'=> $password ?: $password = bcrypt('secret'),
        'remember_token'=> $faker->password,
        'image_name'=> $faker->userName,
        'role_id'=> $faker->numberBetween(1,3),
        'status_id'=> $faker->numberBetween(1,3),
        'confirm'=> $faker->numberBetween(0,1),
        'city'=> $faker->city,
        'street'=> $faker->streetName,
        'alley'=> $faker->streetSuffix,
        'plate'=> $faker->buildingNumber,
        'postal_code'=> $faker->postcode,
        'first_name'=> $faker->firstNameMale,
        'last_name'=> $faker->lastName,
        'sex'=> $faker->numberBetween(1,2),
        'phone'=> $faker->e164PhoneNumber,
        'profession'=> $faker->jobTitle,
        'university'=> $faker->company,
        'birthdate'=> $faker->unixTime(),
        'deleted_at'=> Carbon::now(),

    ];
});

$factory->define(App\Models\Book::class, function (Faker $faker) {
    return [
        'title'=>  $faker->sentence($nbWords = 6, $variableNbWords = true),
        'isbn'=> $faker->isbn13,
        'availability_id'=> $faker->numberBetween(1,4),
        'image_dir'=> $faker->userName,
        'publisher_id'=> $faker->numberBetween(1,5),
        'issue_date'=> $faker->unixTime(),
        'cover'=> $faker->numberBetween(1,10),
        'format_id'=> $faker->numberBetween(1,6),
        'pages'=> $faker->numberBetween(30,1500),
        'weight'=> $faker->numberBetween(500,2500),
        'price'=> $faker->numberBetween(5000,1000000),
        'description'=> $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence($nbWords = 6, $variableNbWords = true),
        'publish_date'=> Carbon::now(),
        'description'=> $faker->paragraph($nbSentences = 5, $variableNbSentences = true) ,
        'article_filename'=> $faker->userName,
        'confirm'=> $faker->numberBetween(1,2),
    ];
});