<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('teachers')->truncate();

        $teachers = [];
        $faker = Factory::create();

        for ($i = 1; $i <= 20; $i++) 
        {
            $date = date("Y-m-d H:i:s", strtotime("2021-09-01 08:00:00 +{$i} days"));
            
            $teachers[] = [
                'title' => $faker->catchPhrase(),
                'avatar' => $faker->imageUrl($width = 640, $height = 480),
                'rating' => rand(1, 5),
                'description' => $faker->paragraphs(rand(1, 3), true),
                'slug' => $faker->slug(),
                'full_name' => $faker->name(),
                'created_at' => $date,  
                'updated_at' => $date 
            ];
        }
        
        DB::table('teachers')->insert($teachers);
    }
}
