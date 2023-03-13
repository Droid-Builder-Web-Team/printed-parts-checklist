<?php

namespace Database\Factories;

use App\Models\DroidFaq;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DroidFaq>
 */
class DroidFaqFactory extends Factory
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
            'content' => $this->faker->sentence(),
        ];
    }
}
