<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kuliner>
 */
class KulinerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $array = ['Makanan', 'Minuman', 'Jajanan'];

        return [
            //
            'nama_kuliner' => $this->faker->name('male'),
            'jenis_kuliner' => $this->faker->randomElement($array),
            'sejarah_kuliner' => $this->faker->text(200),
            // Tinggal Gambar
            'gambar_kuliner' => '/dummies/kuliner-dummie.webp'
        ];
    }
}
