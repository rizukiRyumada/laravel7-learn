<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    // generate sentence buat judul dan slug
    $sentence = $faker->sentence();

    // balikkan nilai, masukkan dan proses faketory
    return [
        'category_id' => rand(1, 3),
        'title' => $sentence,
        'slug' => \Str::slug($sentence), // dengan menggunakan bantuan helper str untuk generate slug
        'body' => $faker->paragraph(10)
    ];

/* --------------------- Cara Run Factorynya di artisan --------------------- */
    /**
     * Buka Tinker
     * jalankan kode ini
     * factory('App\Post', 100)->create();
     * keterangan -> factory('Class\Postition', number_of_creation)->create(); // untuk membuat data fac generator
     */
});
