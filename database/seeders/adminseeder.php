<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \DB::table('siswas')->insert([
            [
                'no_pendaftar' => '12225',
                'nisn' => '528456',
                'nis' => '688978',
                'nik' => '35015135685',
                'fullname' => 'Diky Putra',
                'bakat' => 'IPS',
                'sekolah' => 'SMA 11 JEMBER',
                'status' => 'LULUS',
                'alamat' => 'JEMBER',
            ],
            [
                'no_pendaftar' => '12345',
                'nisn' => '332568',
                'nis' => '6189852',
                'nik' => '350151515178',
                'fullname' => 'Aditya Carlo',
                'bakat' => 'IPA',
                'sekolah' => 'SMA 10 JEMBER',
                'status' => 'PROSES',
                'alamat' => 'JEMBER',
            ],
            [
                'no_pendaftar' => '12355',
                'nisn' => '112587',
                'nis' => '3358688',
                'nik' => '350151515178',
                'fullname' => 'Candra Bakhtiar',
                'bakat' => 'IPA',
                'sekolah' => 'SMA 1 JEMBER',
                'status' => 'PROSES',
                'alamat' => 'JEMBER',
            ],
            [
                'no_pendaftar' => '15555',
                'nisn' => '789456',
                'nis' => '588868',
                'nik' => '35015887571',
                'fullname' => 'Sule Elca',
                'bakat' => 'IPA',
                'sekolah' => 'SMA 1 JEMBER',
                'status' => 'DITOLAK',
                'alamat' => 'JEMBER',
            ]
            
            ]);
    }
    
}
