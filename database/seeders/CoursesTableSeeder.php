<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('courses')->truncate();

        $courses = [];
        $faker = Factory::create();

        for ($i = 1; $i <= 500; $i++) 
        {
            $date = date("Y-m-d H:i:s", strtotime("2021-09-01 08:00:00 +{$i} days"));
            
            $courses[] = [
                'title' => $faker->catchPhrase(),
                'duration' => '2hr',
                'thumbnail' => $faker->imageUrl($width = 640, $height = 480),
                'author' => rand(1, 20),
                'trailler_url' => $faker->url(),
                'description' => $faker->paragraphs(rand(1, 5), true),
                'slug' => $faker->slug(),
                'is_published' => 'published',
                'created_at' => $date,  
                'updated_at' => $date 
            ];
        }
        
        DB::table('courses')->insert($courses);
    }
}
