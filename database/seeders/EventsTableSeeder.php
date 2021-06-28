<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();

        // generate 36 dummy posts data
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::now()->modify('+1 year');

        for ($i = 1; $i <= 36; $i++)
        {
            $date->addDays(10);
            $publishedDate = clone($date);
            $createdDate   = clone($date);

            $posts[] = [
                'title'        => $faker->sentence(rand(6, 8)),
                'slug'    => $faker->slug(),
                'host'      => $faker->text(rand(25, 30)),
                'location' => $faker->name(),
                'starting_date' => $publishedDate,
                'ending_date' => $publishedDate,
                'details'      => $faker->paragraphs(rand(10, 15), true),
                'quote' => $faker->sentence(rand(8, 12)),
                'file_1'  => 'gallery/' . rand(1, 12) . '.jpg',
                'file_2'  => 'gallery/' . rand(1, 12) . '.jpg',
                'file_3'  => 'gallery/' . rand(1, 12) . '.jpg',
                'file_4'  => 'gallery/' . rand(1, 12) . '.jpg',
                'created_at'   => $createdDate,
                'updated_at'   => $createdDate,
                'view_count'   => rand(1, 10) * 10,
            ];
        }

        DB::table('events')->insert($posts);
    }
}
