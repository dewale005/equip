<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();

        $users = [];
        $faker = Factory::create();

        for ($i = 1; $i <= 20; $i++) 
        {
            $date = date("Y-m-d H:i:s", strtotime("2021-09-01 08:00:00 +{$i} days"));
            
            $users[] = [
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'email' => $faker->freeEmail(),
                'phone_number' => $faker->e164PhoneNumber(),
                'password' => Hash::make($faker->password()),
                'created_at' => $date,  
                'updated_at' => $date 
            ];
        }
        
        DB::table('users')->insert($users);
    }
}
