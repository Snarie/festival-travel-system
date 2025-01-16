<?php

namespace Database\Factories;

use App\Models\BusRoute;
use App\Models\Festival;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusRoute>
 */
class BusRouteFactory extends Factory
{
    protected $model = BusRoute::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // For manual creation
            'festival_id' => Festival::factory(),
            // Overwritten when created from seeder
            'departure_time' => $this->faker->dateTimeThisYear(),
            // Overwritten when created from seeder
            'arrival_time' => $this->faker->dateTimeThisYear()
        ];
    }
}
