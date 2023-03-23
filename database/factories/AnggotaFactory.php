<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nisn' => $this->faker->unique()->regexify('[1-9]{10}'),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->regexify('[P,L]{1}'),
            'agama' => $this->faker->word(),
            'alamat' => $this->faker->address(),
            'kelas' => $this->faker->regexify('[1-6]{1}[A-D]{1}')
        ];
    }
}
