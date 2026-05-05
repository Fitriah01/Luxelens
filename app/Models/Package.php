<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'nama_paket',
        'slug',
        'deskripsi',
        'harga',
        'fasilitas',
        'image',
        'kategori',
        'is_popular',
    ];

    protected $casts = [
        'fasilitas'  => 'array',
        'harga'      => 'integer',
        'is_popular' => 'boolean',
    ];
}
