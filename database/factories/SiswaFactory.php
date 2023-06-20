<?php

namespace Database\Factories;

use App\Models\Siswa;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    protected $model = Siswa::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_pendaftar' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'nisn' => $this->faker->unique()->regexify('[0-9]{10}'),
            'nik' => $this->faker->unique()->regexify('[0-9]{16}'),
            'nama_siswa' => $this->faker->name,
            'tempat_lahir' => $this->faker->city,
            'tgl_lahir' => $this->faker->date,
            'jns_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'anak_ke' => $this->faker->numberBetween(1, 10),
            'alamat' => $this->faker->address,
            'no_tlp' => $this->faker->numerify('############'),
            'sts_dlm_keluarga' => $this->faker->randomElement(['Anak Kandung', 'Anak Angkat', 'Saudara']),
            'tgl_diterima' => $this->faker->date,
            'sekolah_asal' => $this->faker->company,
            'nama_ibu' => $this->faker->firstNameFemale,
            'alamat_ortu' => $this->faker->address,
            'foto' => 'default-passfoto.png',
            'status' => $this->faker->randomElement(['LULUS', 'MUTASI']),
            'alasan' => $this->faker->optional()->sentence,
            'kelas_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
