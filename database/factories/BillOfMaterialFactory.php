<?php

namespace Database\Factories;

use App\Models\BillOfMaterial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BillOfMaterial>
 */
class BillOfMaterialFactory extends Factory
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
            'url' => $this->faker->url(),
        ];
    }
}
