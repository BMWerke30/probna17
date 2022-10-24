<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TouristObjectsTableSeeder extends Seeder
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
              DB::table('objects')->insert([
             'name' => $faker->unique()->word,
             'description' => $faker->text(1000),
             'user_id' => $faker->numberBetween(1,10),
             'city_id' => $faker->numberBetween(1,10),

         ]);
       }
    }
}
