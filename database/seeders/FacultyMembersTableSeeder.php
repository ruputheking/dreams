<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class FacultyMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculty_members')->insert([
            [
                'name' => 'Nabin Shrestha',
                'position' => 'CEO at Drink Mart',
                'photo' => 'team/1.jpg',
                'details' => 'Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium',
            ],
            [
                'name' => 'Samir Shrestha',
                'position' => 'CEO at Drink Mart',
                'photo' => 'team/2.jpg',
                'details' => 'Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium',
            ],
            [
                'name' => 'Nikesh Shrestha',
                'position' => 'CEO at Drink Mart',
                'photo' => 'team/3.jpg',
                'details' => 'Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium',
            ],
            [
                'name' => 'Saurav Shrestha',
                'position' => 'CEO at Drink Mart',
                'photo' => 'team/4.jpg',
                'details' => 'Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium',
            ],
            [
                'name' => 'Bikash Shrestha',
                'position' => 'CEO at Drink Mart',
                'photo' => 'team/3.jpg',
                'details' => 'Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium',
            ],
            [
                'name' => 'Surendra Shrestha',
                'position' => 'CEO at Drink Mart',
                'photo' => 'team/2.jpg',
                'details' => 'Lorem ipsum dolor sit ametcon secte adipis elit. Debitis magnam placeat dignissimos saperator ellium',
            ],
        ]);
    }
}
