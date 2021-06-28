<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventCandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_candidates')->delete();

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
                'event_id'        => rand(1, 36),
                'name' => $faker->name(),
                'email'      => $faker->email(),
                'phone' => $faker->phoneNumber,
                'created_at'   => $createdDate,
                'updated_at'   => $createdDate,
            ];
        }

        DB::table('event_candidates')->insert($posts);
    }
}
