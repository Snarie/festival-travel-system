<?php

namespace Database\Factories;

use App\Models\Festival;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Festival>
 */
class FestivalFactory extends Factory
{
    protected $model = Festival::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_time = $this->faker->dateTimeBetween('next Monday', '+6 months');
        $duration = $this->faker->numberBetween(2, 6);
        $end_time = (clone $start_time)->modify("+{$duration} hours");

        return [
            'name' => $this->faker->company . ' Festival',
            'location' => $this->faker->city,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'description' => $this->faker->paragraph,
        ];
    }
}
