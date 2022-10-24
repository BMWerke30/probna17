<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $faker = Faker::create('pl_PL');

         for($i=1;$i<=3;$i++)
         {
                DB::table('roles')->insert([
               'name' => $faker->unique()->randomElement(['owner','tourist','admin'])


           ]);
         }
    }
}
