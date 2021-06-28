<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->delete();

        // generate 36 dummy posts data
        $jobs = [];
        $faker = Factory::create();
        $date = Carbon::now()->modify('-1 year');

        for ($i = 1; $i <= 26; $i++)
        {
            $date->addDays(10);
            $DeadlineDate = clone(Carbon::now()->addDays(rand(15, 50)));
            $publishedDate = clone($date);
            $createdDate   = clone($date);

            $jobs[] = [
                'title'        => $faker->sentence(rand(4, 8)),
                'slug'    => $faker->slug(),
                'summary'      => $faker->text(rand(25, 30)),
                'details'      => $faker->paragraphs(rand(10, 15), true),
                'salary'  => rand(10000, 50000),
                'location' => $faker->address,
                'created_at'   => $i < 30 ? $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays(10) ),
                'updated_at'   => $createdDate,
                'published_at' => $i < 30 ? $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4) ),
                'deadline' => $DeadlineDate,
                'view_count'   => rand(1, 10) * 10,
                'status' => rand(0, 1)
            ];
        }

        DB::table('jobs')->insert($jobs);
    }
}
