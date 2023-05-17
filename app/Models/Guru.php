<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'nama',
        'password',
        'jk',
        'agama',
        'notelp',
        'tempatlahir',
        'tgllahir',
        'foto',
        'alamat',
    ];

    protected $hidden = [
        'nip',
        'nama',
        'password',
        'jk',
        'agama',
        'notelp',
        'tempatlahir',
        'tgllahir',
        'foto',
        'alamat',
    ];
}
