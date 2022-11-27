<?php

namespace Database\Factories;

use App\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition():array
    {
        return [
            'name' => $this->faker->unique()->city,
        ];
    }
}
