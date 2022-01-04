<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('ratings')->truncate();

        // crud course
        $crudPost = new Permission();
        $crudPost->name = "crudcourse";
        $crudPost->save();

        // crud teachers
        $crudTeachers = new Permission();
        $crudTeachers->name = "crudteachers";
        $crudTeachers->save();

        $superadmin = Role::whereName('superadmin')->first();
        $admin = Role::whereName('admin')->first();

        $superadmin->attachPermissions([$crudPost, $crudTeachers]);
        $admin->attachPermissions([$crudPost, $crudTeachers]);
    }
}
