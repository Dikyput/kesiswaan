<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kelas_id',
    ];

    protected $hidden = [
        'nama',
        'kelas_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Datakelas::class, 'kelas_id', 'id');
    }
}
