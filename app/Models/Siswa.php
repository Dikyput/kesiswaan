<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_pendaftar',
        'nisn',
        'nis',
        'nik',
        'fullname',
        'bakat',
        'sekolah',
        'status',
        'alamat',
    ];


    protected $hidden = [
        'no_pendaftar',
        'nisn',
        'nis',
        'nik',
        'fullname',
        'bakat',
        'sekolah',
        'status',
        'alamat',
    ];

    protected $appends = [
        'profile_photo_url',
    ];
}
