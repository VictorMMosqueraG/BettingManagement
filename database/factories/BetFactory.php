<?php

namespace Database\Factories;

use App\Models\Bet;
use App\Models\User;
use App\Models\SportsEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class BetFactory extends Factory{
    protected $model = Bet::class;

    public function definition(){
        return [
            'user_id' => User::factory(),
            'event_id' => SportsEvent::factory(),
            'amount' => $this->faker->numberBetween(50, 500),
            'odds' => $this->faker->randomFloat(2, 1, 5),
        ];
    }
}
