<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CourseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_categories')->insert([
            [
                'title' => 'Others',
                'slug' => 'others'
            ]
        ]);
    }
}
