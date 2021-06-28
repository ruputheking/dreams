<?php

namespace Database\Seeders;

use DB;
use Faker\Factory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->delete();

        // generate 36 dummy posts data
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::now()->modify('-1 year');

        for ($i = 1; $i <= 26; $i++)
        {
            $date->addDays(10);
            $publishedDate = clone($date);
            $createdDate   = clone($date);

            $posts[] = [
                'author_id' => 1,
                'title'        => $faker->sentence(rand(8, 12)),
                'slug'    => $faker->slug(),
                'summary'      => $faker->text(rand(250, 300)),
                'description'      => $faker->paragraphs(rand(10, 15), true),
                'feature_image'  => 'blog/' . rand(1, 4) . '.jpg',
                'category_id'  => rand(1, 5),
                'created_at'   => $i < 30 ? $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays(10) ),
                'updated_at'   => $createdDate,
                'published_at' => $i < 30 ? $publishedDate : ( rand(0, 1) == 0 ? NULL : $publishedDate->addDays(4) ),
                'view_count'   => rand(1, 10) * 10,
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
