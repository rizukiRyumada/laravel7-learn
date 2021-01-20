<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

/* -------------------------------------------------------------------------- */
/*                                    Seeds                                   */
/* -------------------------------------------------------------------------- */
    /**
     * untuk membuat seed
     *  php artisan make:seeder CategoriesTableSeeder
     *
     * Pastikan variable $fillable sudah di set di model \App\Category
     *
     * untuk apply seed ke database
     *  php artisan DB::seed --class=CategoriesTableSeeder
     */

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // buat kategori data statis dan menyimpannya dalam variable array collection
        $categories = collect(['Framework', 'Code']);
        $categories->each(function($c){
            \App\Category::create([
                'name' => $c,
                'slug' => \Str::slug($c)
            ]);
        });
    }
}
