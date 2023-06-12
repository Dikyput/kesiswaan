<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_walikelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'guru_id',
        'namakelas',
    ];

    protected $hidden = [
        'guru_id',
        'namakelas',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
}
