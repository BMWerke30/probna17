<?php

namespace Database\Seeders;

use App\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::factory()
            ->count(10)
            ->create();
    }
}
