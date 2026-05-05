<div style="font-family: 'Playfair Display', serif; padding: 20px; border: 1px solid #eee; max-width: 600px;">
    <h2 style="border-bottom: 2px solid #333; padding-bottom: 10px;">INVOICE BOOKING #{{ $booking->id }}</h2>
    <p>Halo <strong>{{ $booking->nama_customer }}</strong>,</p>
    <p>Terima kasih telah memilih <strong>LuxeLens Photography</strong>. Berikut adalah detail pesanan Anda:</p>

    <table style="width: 100%; margin: 20px 0;">
        <tr><td><strong>Kategori</strong></td><td>: {{ $booking->kategori }}</td></tr>
        <tr><td><strong>Tanggal</strong></td><td>: {{ $booking->tanggal_pemotretan }}</td></tr>
        <tr><td><strong>Status</strong></td><td>: <span style="color: gold;">PENDING</span></td></tr>
    </table>

    <p>Silakan tunggu konfirmasi selanjutnya dari tim kami.</p>
    <hr>
    <footer style="font-size: 10px; color: #999;">LUXELENS Management System - 2026</footer>
</div>
