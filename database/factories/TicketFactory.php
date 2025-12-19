<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $array = ['Lokal', 'Mancanegara'];
        return [
            //
            'nama_ticket' => $this->faker->name('male'),
            'label_ticket' => $this->faker->words(2, true),
            'jenis_ticket' => $this->faker->randomElement($array),
            'harga_ticket' => $this->faker->numberBetween(17000, 25000)
        ];
    }
}
