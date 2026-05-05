<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['user_id', 'nama_customer', 'pesan', 'bintang', 'status', 'admin_reply'];
}
