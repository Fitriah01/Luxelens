<?php

namespace App\Models;

// WAJIB ganti extends-nya ke Authenticatable
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
