<?php

namespace Database\Factories;

use App\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'number' => $this->faker->numberBetween(1, 10),
            'street' => $this->faker->streetName,
        ];
    }
}
