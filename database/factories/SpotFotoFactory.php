<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpotFoto>
 */
class SpotFotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $array = ['Jalanan', 'Rumah'];

        return [
            //
            'nama_spot_foto' => $this->faker->name('male'),
            'jenis_spot_foto' => $this->faker->randomElement($array),
            'gambar_spot_foto' => 'spot-fotos/spot-foto-dummie.webp',
            'deskripsi_spot_foto' => $this->faker->text(200)
        ];
    }
}
