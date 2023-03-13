<?php

namespace Database\Factories;

use App\Models\Instruction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Instruction>
 */
class InstructionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'droids_id' => $this->faker->numberBetween(0, 10),
            'title' => $this->faker->sentence(),
            'url' => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
