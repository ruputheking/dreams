<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        // $this->call(NewsTableSeeder::class);
        // $this->call(TagsTableSeeder::class);
        // $this->call(CommentsTableSeeder::class);
        $this->call(FoldersTableSeeder::class);
        // $this->call(GalleriesTableSeeder::class);
        // $this->call(NoticesTableSeeder::class);
        // $this->call(NoticeCommentsTableSeeder::class);
        // $this->call(EventsTableSeeder::class);
        // $this->call(EventCandidatesTableSeeder::class);
        // $this->call(EventSpeakersTableSeeder::class);
        $this->call(CourseCategoriesTableSeeder::class);
        // $this->call(CoursesTableSeeder::class);
        // $this->call(CourseCommentsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(TeachersTableSeeder::class);
        // $this->call(FaqsTableSeeder::class);
        // $this->call(JobsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ClassDaysTableSeeder::class);
        $this->call(PicklistsTableSeeder::class);
        $this->call(AcademicYearsTableSeeder::class);
        // $this->call(TestimonialsTableSeeder::class);
        // $this->call(FacultyMembersTableSeeder::class);
    }
}
