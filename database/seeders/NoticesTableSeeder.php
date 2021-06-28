<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Carbon\Carbon;
use App\Models\Notice;
use Illuminate\Database\Seeder;

class NoticesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notices')->delete();

        // generate 36 dummy posts data
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::now()->modify('-1 year');

        for ($i = 1; $i <= 36; $i++)
        {
            $date->addDays(10);
            $publishedDate = clone($date);
            $createdDate   = clone($date);

            $posts[] = [
                'title'        => $faker->sentence(rand(8, 12)),
                'slug'    => $faker->slug(),
                'summary'      => $faker->text(rand(250, 300)),
                'details'      => $faker->paragraphs(rand(10, 15), true),
                'created_at'   => $createdDate,
                'updated_at'   => $createdDate,
                'view_count'   => rand(1, 10) * 10,
            ];
        }

        DB::table('notices')->insert($posts);
    }
}
