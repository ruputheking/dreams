<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AcademicYearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academic_years')->insert([
            [
                'session' => '2021',
                'year' => '2021 - 2022'
            ]
        ]);
    }
}
