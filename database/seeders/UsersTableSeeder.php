<?php

namespace Database\Seeders;

use DB;
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
        DB::table('users')->insert([
            [
                'user_name' => 'Rupesh Chaudhary',
                'email' => 'rupeshchaudhary7338@gmail.com',
                'phone' => '9880227545',
                'password' => bcrypt('rupesh@12'),
                'photo' => 'profile.png',
            ]
        ]);
    }
}
