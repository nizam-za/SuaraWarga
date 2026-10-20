<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataLatih extends Model
{
    protected $fillable = [
        'teks_pengaduan',
        'kategori',
    ];
}
