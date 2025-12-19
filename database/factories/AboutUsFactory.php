<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutUs>
 */
class AboutUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'orientation' => $this->faker->sentences(4, true),
            'orientation_image' => 'about-us/orientation-image.webp',
            'kadjoetangan_history' => $this->faker->sentences(4, true),
            'kadjoetangan_image' => 'about-us/kadjoetangan-dummmie.webp',
            'vision' => $this->faker->sentences(2, true),
            'mission' => $this->faker->sentences(3, true)
        ];
    }
}
