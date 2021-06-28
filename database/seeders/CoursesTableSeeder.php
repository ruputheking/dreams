<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->delete();

        // generate 36 dummy posts data
        $courses = [];
        $faker = Factory::create();
        $date = Carbon::now()->modify('-1 year');

        for ($i = 1; $i <= 36; $i++)
        {
            $date->addDays(10);
            $createdDate   = clone($date);

            $courses[] = [
                'title'        => $faker->sentence(rand(8, 12)),
                'slug'    => $faker->slug(),
                'summary'      => $faker->text(rand(250, 300)),
                'description'      => $faker->paragraphs(rand(10, 15), true),
                'feature_image'  => 'course/' . 'f-course' .rand(1, 3) . '.jpg',
                'starting_date' => Carbon::today()->toDateString(),
                'schedule' => 'Sunday, Monday & Friday',
                'starting_time' => $date->toTimeString(),
                'ending_time' => Carbon::today()->toTimeString(),
                'price' => rand(5000, 25000),
                'duration' => '1 Month',
                'total_credit' => rand(20, 50),
                'max_student' => rand(45, 120),
                'category_id'  => rand(1, 5),
                'created_at'   => $createdDate,
                'updated_at'   => $createdDate,
                'view_count'   => rand(1, 10) * 10,
                'status' => 1
            ];
        }

        DB::table('courses')->insert($courses);
    }
}
