<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSpeakersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_speakers')->delete();

        // generate 36 dummy posts data
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::now()->modify('+1 year');

        for ($i = 1; $i <= 36; $i++)
        {
            $date->addDays(10);
            $createdDate   = clone($date);

            $posts[] = [
                'name'        => $faker->name(),
                'event_id'    => rand(1, 36),
                'position'      => $faker->text(rand(25, 30)),
                'photo'  => 'team/' . rand(1, 4) . '.jpg',
                'created_at'   => $createdDate,
                'updated_at'   => $createdDate,
            ];
        }

        DB::table('event_speakers')->insert($posts);
    }
}
