<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nis',
        'nik',
        'fullname',
        'alasan',
    ];


    protected $hidden = [
        'nisn',
        'nis',
        'nik',
        'fullname',
        'alasan',
    ];
}
