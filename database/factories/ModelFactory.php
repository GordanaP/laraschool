<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//User
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    $name = strtolower($faker->firstName);

    return [
        'name' => $name,
        'email' => $name.'@gmail.com',
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});


//Category
$factory->define(App\Category::class, function (Faker\Generator $faker) {

    $name = $faker->word;

    return [
        'name' => $name,
    ];
});


// Thread
$factory->define(App\Thread::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => function(){
            return factory(App\User::class)->create()->id;
        },
        'category_id' => function(){
            return factory(App\Category::class)->create()->id;
        },
    ];
});

// Reply
$factory->define(App\Reply::class, function (Faker\Generator $faker) {

    return [
        'body' => $faker->paragraph,
        'user_id' => function(){
            return factory(App\User::class)->create()->id;
        },
        'thread_id' => function(){
            return factory(App\Thread::class)->create()->id;
        }
    ];
});
