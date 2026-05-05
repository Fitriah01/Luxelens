<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'booking_code',
        'nama_customer',
        'email',
        'nomor_telepon',
        'kategori',
        'tanggal_pemotretan',
        'status',
        'payment_status',
        'paket',
        'harga',
        'amount_paid',
        'rejection_note',
        'photographer_name',
        'proof_payment',
        'link_results',
        'booking_type',
        'event_details',
        'estimasi_durasi',
    ];
}
