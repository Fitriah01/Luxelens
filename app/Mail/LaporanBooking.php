<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class LaporanBooking extends Mailable
{
    use Queueable, SerializesModels;

    public $booking; // Variabel untuk menampung data

    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Laporan Booking ProjectSIM - ' . $this->booking->nama_customer,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.laporan', // Kita akan buat file tampilan ini
        );
    }
}
