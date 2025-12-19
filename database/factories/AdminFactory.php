<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Pest\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
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
            'username' => $this->faker->userName(),
            'email' => $this->faker->email(),
            'password' => Hash::make('password'),
            'is_active' => true,
            'role' => 'admin',
            'remember_token' => Str::random(10),
            
        ];
    }
}
