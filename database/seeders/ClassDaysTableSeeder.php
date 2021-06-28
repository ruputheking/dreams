<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ClassDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_days')->insert([
            [
                'day' => 'Sunday',
                'is_active' => 1
            ],
            [
                'day' => 'Monday',
                'is_active' => 1
            ],
            [
                'day' => 'Tuesday',
                'is_active' => 1
            ],
            [
                'day' => 'Wednesday',
                'is_active' => 1
            ],
            [
                'day' => 'Thursday',
                'is_active' => 1
            ],
            [
                'day' => 'Friday',
                'is_active' => 1
            ],
            [
                'day' => 'Saturday',
                'is_active' => 1
            ],
        ]);
    }
}
