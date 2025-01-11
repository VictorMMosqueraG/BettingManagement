<?php

namespace Database\Factories;

use App\Models\SportsEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class SportsEventFactory extends Factory
{
    protected $model = SportsEvent::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'event_date' => $this->faker->dateTime,
            'sport_type' => $this->faker->randomElement(['Football', 'Basketball', 'Tennis']),
        ];
    }
}
