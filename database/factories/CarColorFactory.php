<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarColor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarColorFactory extends Factory
{
    protected $model = CarColor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'color_id' =>  $this->faker->numberBetween(1, 50),
            'car_id' =>  $this->faker->numberBetween(1, 50),
            'car_type' => Car::class
        ];
    }
}
