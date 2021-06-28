<?php

namespace Database\Seeders;

use DB;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resets the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();
        DB::table('role_user')->truncate();

        // Create Admin role
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();

        // Create Teacher role
        $teacher = new Role();
        $teacher->name = "teacher";
        $teacher->display_name = "Teacher";
        $teacher->save();

        // Create Student role
        $student = new Role();
        $student->name = "student";
        $student->display_name = "Student";
        $student->save();

        // Create Guardian role
        $guardian = new Role();
        $guardian->name = "guardian";
        $guardian->display_name = "Guardian";
        $guardian->save();

        // Create Accountant role
        $accountant = new Role();
        $accountant->name = "accountant";
        $accountant->display_name = "Accountant";
        $accountant->save();

        // Create Receptionist role
        $receptionist = new Role();
        $receptionist->name = "receptionist";
        $receptionist->display_name = "Receptionist";
        $receptionist->save();

        // Create User role
        $user = new Role();
        $user->name = "user";
        $user->display_name = 'User';
        $user->save();

        // Attach the roles
        // first user as admin
        $user2 = User::find(1);
        $user2->detachRole($admin);
        $user2->attachRole($admin);
    }
}
