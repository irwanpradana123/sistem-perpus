<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode_buku' => $this->faker->unique()->regexify('[1-9]{10}'),
            'judul' => $this->faker->word(),
            'penerbit' => $this->faker->name(),
            'tahun_terbit' => $this->faker->year(),
            'stok_buku' => $this->faker->regexify('[1-20]')
        ];
    }
}
