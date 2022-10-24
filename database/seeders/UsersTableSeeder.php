<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           // ('pl_PL')zapewnia ze wszystkie dane beda po polsku
      $faker = Faker::create('pl_PL');

           for($i=1;$i<=10;$i++)
           {
          DB::table('users')->insert([
         'name' => $faker->firstName,
         'surname' => $faker->lastName,
         'email' => $faker->email,
         'password' => bcrypt('passwpassw'),
     ]);
   }

   }



}
