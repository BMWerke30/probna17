<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker = Faker::create('pl_PL');

       for($i=1;$i<=10;$i++)
       {
              DB::table('role_user')->insert([

             'user_id' => $faker->unique()->numberBetween(1,10),
             'role_id' => $faker->randomElement([1,2,3]),


         ]);
       }
    }
}
