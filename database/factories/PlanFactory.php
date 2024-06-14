<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'duration' => $this->faker->randomNumber(2),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'created_at' => $this->faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
        ];
    }
}
