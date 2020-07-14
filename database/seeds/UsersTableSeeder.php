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

            'name' => 'Rahma',
            'username' => 'rahma',
            'password' => bcrypt('password'),
            'email' => 'rahma@code.com',
        ]);
    }
}
