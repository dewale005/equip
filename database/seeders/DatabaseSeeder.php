<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();
        // $this->call(UserTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(FeatureTableSeeder::class);
        $this->call(RatingTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
