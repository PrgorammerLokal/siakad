<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $fillable = [
        'kode_prodi',
        'nama'
    ];

    public function getRouteKeyName()
    {
        return 'kode_prodi';
    }
}
