<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'email',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kel',
        'agama'
    ];
}
