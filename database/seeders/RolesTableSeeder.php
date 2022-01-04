<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        
        // create super admin role
        $superadmin = new Role();
        $superadmin->name = "superadmin";
        $superadmin->display_name = "Super Admin";
        $superadmin->save();

        // create admin role
        $admin = new Role();
        $admin->name = "admin";
        $admin->display_name = "Admin";
        $admin->save();

        // create student role
        $student = new Role();
        $student->name = "student";
        $student->display_name = "Student";
        $student->save();


        // user with admin role
        $user = User::find(21);
        $user->attachRole($superadmin);


        // user with student role
        $user = User::find(22);
        $user->attachRole($student);

    }
}
