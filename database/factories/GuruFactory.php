<?php

namespace Database\Factories;

use App\Models\Guru;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    protected $model = Guru::class;
    /**
     * Define the model's default state.
     *
     * @return array<strings, mixed>
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->unique()->regexify('[0-17]{18}'),
            'nama' => $this->faker->name,
            'password' => bcrypt('password'),
            'jk' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'notelp' => $this->faker->unique()->numerify('############'),
            'tempatlahir' => $this->faker->city,
            'tgllahir' => $this->faker->date,
            'foto' => 'default-foto.jpg',
            'wali_kelas' => 0,
            'alamat' => $this->faker->address,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
