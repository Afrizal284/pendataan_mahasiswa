<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'foto',
        'user_id',
        'email'
    ];
}
