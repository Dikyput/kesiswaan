<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
    ];

    protected $hidden = [
        'nama',
    ];

    public function tingkatkelas()
    {
        return $this->belongsTo(Kelas::class, 'tingkat_kelas', 'id');
    }
}
