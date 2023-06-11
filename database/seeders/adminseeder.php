<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
        \DB::table('gurus')->insert([
	        [
            'nip' => '222225',
            'nama' => 'Sugeng Herlambang',
            'password' => Hash::make('111222'),
            'jk' => 'Laki Laki',
            'agama' => 'Islam',
            'notelp' => '085987758',
            'tempatlahir' => 'Bondowoso',
            'tgllahir' => Carbon::parse('1980-01-01'),
            'alamat' => 'Bondowos 1',
            ],
            [
                'nip' => '332325',
                'nama' => 'Rina Putri',
                'password' => Hash::make('22312'),
                'jk' => 'Perempuan',
                'agama' => 'Islam',
                'notelp' => '0875788859',
                'tempatlahir' => 'Jember',
                'tgllahir' => Carbon::parse('1990-02-05'),
                'alamat' => 'Jember Kidul',
                ],
		]);
        \DB::table('siswas')->insert([
            [
                'no_pendaftar' => '2',
                'nisn' => '123',
                'nis' => '1234',
                'nik' => '12345',
                'fullname' => 'Diky Putra',
                'bakat' => 'IPS',
                'sekolah' => 'SMA 11 JEMBER',
                'status' => 'LULUS',
                'alamat' => 'JEMBER',
                'alasan' => '',
            ],
            [
                'no_pendaftar' => '3',
                'nisn' => '321',
                'nis' => '4321',
                'nik' => '4321',
                'fullname' => 'Aditya Carlo',
                'bakat' => 'IPA',
                'sekolah' => 'SMA 10 JEMBER',
                'status' => 'PROSES',
                'alamat' => 'JEMBER',
                'alasan' => '',
            ],
            [
                'no_pendaftar' => '4',
                'nisn' => '567',
                'nis' => '765',
                'nik' => '5678',
                'fullname' => 'Candra Bakhtiar',
                'bakat' => 'IPA',
                'sekolah' => 'SMA 1 JEMBER',
                'status' => 'PROSES',
                'alamat' => 'JEMBER',
                'alasan' => '',
            ],
            [
                'no_pendaftar' => '5',
                'nisn' => '789',
                'nis' => '987',
                'nik' => '0987',
                'fullname' => 'Sule Elca',
                'bakat' => 'IPA',
                'sekolah' => 'SMA 1 JEMBER',
                'status' => 'MUTASI',
                'alamat' => 'JEMBER',
                'alasan' => 'PINDAH KOTA',
            ]
            
            ]);
    }
    
}
