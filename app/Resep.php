<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $table = 'resep';
    protected $fillable = [
        'id','judul', 'gambar', 'bahan','alat', 'langkah'
    ];
}