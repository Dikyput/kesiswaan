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
        'nik',
        'nama_siswa',
        'tempat_lahir',
        'tgl_lahir',
        'jns_kelamin',
        'agama',
        'Anak_ke',
        'alamat',
        'no_tlp',
        'sts_dlm_keluarga',
        'tgl_diterima',
        'sekolah_asal',
        'nama_ibu',
        'alamat_ortu',
    ];
}
