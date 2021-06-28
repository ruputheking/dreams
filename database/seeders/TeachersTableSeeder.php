<?php

namespace Database\Seeders;

use DB;
use App\Models\Course;
use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::where('status', 1)->take(5)->get();
        DB::table('teachers')->insert([
            [
                'user_id' => 2,
                'name' => 'Nikesh Sharma',
                'phone' => '9880227545',
                'email' => 'nikeshsharma@gmail.com',
                'photo' => 'profile.png',
                'position' => 'Teacher',
                'facebook' => '#',
                'instagram' => '#',
                'bio' => ''
            ],
            [
                'user_id' => 3,
                'name' => 'Bikash Shah',
                'phone' => '9880227542',
                'email' => 'bikashshah@gmail.com',
                'photo' => 'profile.png',
                'position' => 'Teacher',
                'facebook' => '#',
                'instagram' => '#',
                'bio' => ''
            ],
            [
                'user_id' => 4,
                'name' => 'Samir Shrestha',
                'phone' => '9880227543',
                'email' => 'samirshrestha@gmail.com',
                'photo' => 'profile.png',
                'position' => 'Teacher',
                'facebook' => '#',
                'instagram' => '#',
                'bio' => ''
            ],
            [
                'user_id' => 5,
                'name' => 'Surendra Singh',
                'phone' => '9880227544',
                'email' => 'surendrasingh@gmail.com',
                'photo' => 'profile.png',
                'position' => 'Teacher',
                'facebook' => '#',
                'instagram' => '#',
                'bio' => ''
            ],
        ]);

        foreach ($courses as $key => $course) {
            DB::table('course_teachers')->insert([
                'teacher_id' => ++$key,
                'course_id' => $course->id,
            ]);
        }
    }
}
