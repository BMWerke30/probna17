<?php

namespace Database\Seeders;

use App\Address;
use App\Reservation;
use App\Room;
use App\TouristObject;
use Illuminate\Database\Seeder;

class TouristObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TouristObject::factory()
            ->count(10)
            ->has(
                Room::factory()
                    ->count(rand(1, 5))
                    ->has(Reservation::factory()),
                'rooms'
            )
            ->create()
            ->each(function (TouristObject $object) {
                $object->address()->save(Address::factory()->make());
            });
    }
}
