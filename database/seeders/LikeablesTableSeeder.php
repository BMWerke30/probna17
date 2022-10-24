<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class LikeablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Faker::create('pl_PL');

       for($i=1;$i<=40;$i++)
       {
         DB::table('likeables')->insert([
          'likeable_type' => $faker->randomElement(['App\TouristObject', 'App\Article']),   // tutaj bylo z App/ ale zobaczymy
          'likeable_id' => $faker->numberBetween(1,10),
          'user_id' => $faker->numberBetween(1,10),
           ]);
      }

    }
}
