<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'availability_id' => $faker->randomNumber(5),
        'image_dir' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,
        'isbn' => $faker->sentence,
        'publisher_id' => $faker->randomNumber(5),
        'description' => $faker->text(),
        'issue_date' => $faker->sentence,
        'cover' => $faker->randomNumber(5),
        'format_id' => $faker->randomNumber(5),
        'pages' => $faker->randomNumber(5),
        'weight' => $faker->randomNumber(5),
        'price' => $faker->randomNumber(5),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'publish_date' => $faker->sentence,
        'description' => $faker->text(),
        'article_filename' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,
        'confirm' => $faker->randomNumber(5),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Author::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'role_id' => $faker->randomNumber(5),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Factor::class, function (Faker\Generator $faker) {
    return [
        'borrow_status' => $faker->randomNumber(5),
        'quantity' => $faker->randomNumber(5),
        'borrow_date' => $faker->sentence,
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,
        'reserve_date' => $faker->sentence,
        'duration' => $faker->sentence,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Message::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->randomNumber(5),
        'content' => $faker->text(),
        'email' => $faker->email,
        'admin_id' => $faker->randomNumber(5),
        'create_at' => $faker->sentence,
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\News::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->text(),
        'image_dir' => $faker->text(),
        'created_at' => $faker->sentence,
        'updated_at' => $faker->sentence,
        'user_id' => $faker->randomNumber(5),
        'confirm' => $faker->randomNumber(5),
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\BookComment::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\NewsComment::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Publisher::class, function (Faker\Generator $faker) {
    return [
        
        
    ];
});

