<?php

namespace Database\Factories;

use App\Models\Droid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Droid>
 */
class DroidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
//            'name' => $this->faker->bothify('?#-?#'),
            'name' => $this->faker->regexify('[A-Z][0-9]-[A-Z][0-9]'),
            'version' => $this->faker->randomElement(['MKI', 'MKII', 'MKIII']),
            'description' => $this->faker->sentence(),
            'tags' => $this->faker->word(),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'type' => $this->faker->word(),
        ];
    }
}
