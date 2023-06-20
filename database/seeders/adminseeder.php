<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'fullname' => 'Admin',
            'email' => 'admin@polije.ac.id',
            'password' => Hash::make('123123123'),
            'roles' => 'admin',
        ]);

        \DB::table('kelas')->insert([
            [
                'kelas' => 'X',
            ],
            [
                'kelas' => 'XI',
            ],
            [
                'kelas' => 'XII',
            ],

        ]);

        \DB::table('datakelas')->insert([
            [
                'nama' => 'IPA 1',
                'tingkat_kelas' => 1,
            ],
            [
                'nama' => 'IPA 2',
                'tingkat_kelas' => 1,
            ],
            [
                'nama' => 'IPS 1',
                'tingkat_kelas' => 1,
            ],
            [
                'nama' => 'IPS 2',
                'tingkat_kelas' => 1,
            ],
            [
                'nama' => 'IPA 1',
                'tingkat_kelas' => 2,
            ],
            [
                'nama' => 'IPA 2',
                'tingkat_kelas' => 2,
            ],
            [
                'nama' => 'IPS 1',
                'tingkat_kelas' => 2,
            ],
            [
                'nama' => 'IPS 2',
                'tingkat_kelas' => 2,
            ],
            [
                'nama' => 'IPA 1',
                'tingkat_kelas' => 3,
            ],
            [
                'nama' => 'IPA 2',
                'tingkat_kelas' => 3,
            ],
            [
                'nama' => 'IPS 1',
                'tingkat_kelas' => 3,
            ],
            [
                'nama' => 'IPS 2',
                'tingkat_kelas' => 3,
            ],

        ]);
    }

}
