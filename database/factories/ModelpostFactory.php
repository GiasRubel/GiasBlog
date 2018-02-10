<?php

use App\catagory;
use Faker\Generator as Faker;

$factory->define(App\post::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'body'  => $faker->text($maxNbChars = 200) ,
        'slug'  => $faker->slug,
        'catagory_id' => function(){
        	return catagory::all()->random();
        },
        'image' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
 