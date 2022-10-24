<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $faker = Faker::create('pl_PL');

         for($i=1;$i<=60;$i++)
         {
                DB::table('notifications')->insert([
               'user_id' => $faker->numberBetween(1,10),
               'content' => $faker->sentence,
               'status' => $faker->boolean(50),  //50 procent szans ze dostepny i niedostepny
               'shown' => $faker->boolean(0),   

           ]);
         }
    }
}
