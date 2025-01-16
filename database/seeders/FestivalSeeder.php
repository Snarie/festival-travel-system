<?php

namespace Database\Seeders;

use App\Models\BusRoute;
use App\Models\Festival;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FestivalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Festival::factory()
            ->has(
                BusRoute::factory()
                    ->count(5)
                    ->state(function (array $attributes, Festival $festival) {
                        return [
                            'departure_time' => (clone $festival->start_time)->modify('-3 hours'),
                            'arrival_time' => (clone $festival->start_time)->modify('-1 hour')
                        ];
                    }),
                'busRoutes'
            )
            ->count(20)
            ->create();
    }
}
