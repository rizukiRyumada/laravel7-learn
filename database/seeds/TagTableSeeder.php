<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // buat tag data statis dan menyimpannya dalam variable array collection
        $tags = collect(['Laravel', 'Foundation', 'Slim', 'Bug', 'Help']);
        $tags->each(function($c){
            \App\Tag::create([
                'name' => $c,
                'slug' => \Str::slug($c)
            ]);
        });
    }
}
