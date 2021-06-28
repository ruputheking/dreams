<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Notice;
use App\Models\NoticeComment;
use Illuminate\Database\Seeder;

class NoticeCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker    = Factory::create();
        $comments = [];

        $posts = Notice::published()->latest()->take(5)->get();
        foreach ($posts as $post)
        {
            for ($i = 1; $i <= rand(1, 10); $i++)
            {
                $commentDate = $post->published_at->modify("+{$i} hours");

                $comments[] = [
                    'notice_id' => $post->id,
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'phone' => $faker->phoneNumber,
                    'comments' => $faker->paragraphs(rand(1, 5), true),
                    'status' => rand(0, 1),
                    'created_at' => $commentDate,
                    'updated_at' => $commentDate,
                ];
            }
        }
        // Comment::delete();
        NoticeComment::insert($comments);
    }
}
