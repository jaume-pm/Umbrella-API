<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Concert>
 */
class ConcertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "max_capacity"=> $this->faker->numberBetween(1000,100000),
            "is_outdoors" => $this->faker->boolean,
            "address"=> $this->faker->address,
            "datetime"=> $this->faker->dateTime,
            "city" => $this->faker->city,
            "country"=> $this->faker->country,
            "latitude"=> $this->faker->randomFloat(6,0,90),
            "longitude"=> $this->faker->randomFloat(6,0,90),
        ];
    }
}
