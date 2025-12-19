<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Award>
 */
class AwardFactory extends Factory
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
            'nama_award' => $this->faker->name('male'),
            'gambar_award' => 'awards/award-dummie.webp',
            'tanggal_penerimaan_award' => Carbon::now(),
            'deskripsi_award' => $this->faker->text(200)
        ];
    }
}
