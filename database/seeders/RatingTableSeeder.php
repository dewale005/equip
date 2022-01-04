<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingTableSeeder extends Seeder
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

        $ratings = [];
        $faker = Factory::create();

        for ($i = 1; $i <= 2000; $i++) 
        {
            $date = date("Y-m-d H:i:s", strtotime("2021-09-01 08:00:00 +{$i} days"));
            
            $ratings[] = [
                'rating' => rand(1, 5),
                'course' => rand(1, 500),
                'comments' => $faker->paragraphs(rand(1, 2), true),
                'user' => rand(1, 20),
                'created_at' => $date,  
                'updated_at' => $date 
            ];
        }
        
        DB::table('ratings')->insert($ratings);
    }
}
