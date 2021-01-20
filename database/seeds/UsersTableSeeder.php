<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Rizuki Ryumada',
            'username' => 'rizukiRyumada',
            'password' => bcrypt('1234567890'),
            'email' => 'rizukiryumada@garasijogi.dev'
        ]);
    }
}
