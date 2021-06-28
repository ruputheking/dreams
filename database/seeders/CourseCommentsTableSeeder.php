<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Course;
use App\Models\CourseComment;
use Illuminate\Database\Seeder;

class CourseCommentsTableSeeder extends Seeder
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

        $courses = Course::where('status', 1)->take(5)->get();
        foreach ($courses as $course)
        {
            for ($i = 1; $i <= rand(1, 10); $i++)
            {
                $commentDate = $course->created_at->modify("+{$i} hours");

                $comments[] = [
                    'course_id' => $course->id,
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
        CourseComment::insert($comments);
    }
}
