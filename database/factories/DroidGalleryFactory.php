<?php

namespace Database\Factories;

use App\Models\DroidGallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DroidGallery>
 */
class DroidGalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url(),
        ];
    }
}
