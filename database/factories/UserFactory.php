<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     *
     * @var string
     */
    protected $model = User::class;

    /**
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'balance' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
