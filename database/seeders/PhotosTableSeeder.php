<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create('pl_PL');

       for($i=1;$i<=100;$i++)
       {
         DB::table('photos')->insert([
          'photoable_type' => 'App\TouristObject',
          'photoable_id' => $faker->numberBetween(1,30),
          'path' => $faker->imageUrl(800,400,'city'),
          ]);
      }


      for($i=1;$i<=200;$i++)
      {
        DB::table('photos')->insert([
         'photoable_type' => 'App\Room',
         'photoable_id' => $faker->numberBetween(1,10),
         'path' => $faker->imageUrl(800,400,'nightlife'),

          ]);
      }


      for($i=1;$i<=10;$i++)
      {
        DB::table('photos')->insert([
         'photoable_type' => 'App\User',
         'photoable_id' => $faker->unique()->numberBetween(1, 10),
         'path' => $faker->imageUrl(200, 300, 'people'),

          ]);
      }



    }
}
