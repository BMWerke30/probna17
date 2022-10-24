<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AddressesTableSeeder extends Seeder
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
          DB::table('addresses')->insert([
            'number' => $faker->numberBetween(1,10),
            'street' => $faker->streetName,
            'object_id' => $faker->unique()->numberBetween(1,10),

     ]);
   }
    }
}
