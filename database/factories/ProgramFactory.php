<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plan_id' => \App\Models\Plan::inRandomOrder()->first()->id,
            'exercise_id' => \App\Models\Exercise::inRandomOrder()->first()->id,
            'sets' => $this->faker->numberBetween(5, 12),
            'reps' => $this->faker->numberBetween(2, 5),
        ];
    }
}
