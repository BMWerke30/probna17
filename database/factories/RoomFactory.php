<?php

namespace Database\Factories;

use App\Photo;
use App\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'room_number' => $this->faker->unique()->numberBetween(1, 100),
            'room_size' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->numberBetween(100, 600),
            'description' => $this->faker->text(1000),
        ];
    }

    /**
     * @return RoomFactory
     */
    public function configure(): RoomFactory
    {
        return $this->afterCreating(function (Room $room) {
            $room->photos()->save(Photo::factory()->make());
        });
    }
}
