<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('features')->truncate();

        $features = [];
        $faker = Factory::create();

        for ($i = 1; $i <= 2000; $i++) 
        {
            $date = date("Y-m-d H:i:s", strtotime("2021-09-01 08:00:00 +{$i} days"));
            
            $features[] = [
                'title' => $faker->catchPhrase(),
                'course' => rand(1, 500),
                'created_at' => $date,  
                'updated_at' => $date 
            ];
        }
        
        DB::table('features')->insert($features);
    }
}
