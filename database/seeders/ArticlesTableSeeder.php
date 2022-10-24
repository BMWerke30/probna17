<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create('pl_PL');

   for($i=1;$i<=30;$i++)
   {
          DB::table('articles')->insert([
         'title' => $faker->text(20),
         'content' => $faker->text(1000),
         'created_at' => $faker->dateTime,
         'user_id' => $faker->numberBetween(1,10),
         'object_id' => $faker->numberBetween(1,10),


     ]);
   }
    }
}
