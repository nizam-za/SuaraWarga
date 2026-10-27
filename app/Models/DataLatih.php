<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataLatih extends Model
{
    protected $fillable = [
        'id',
        'teks_pengaduan',
        'kategori',
    ];
}
