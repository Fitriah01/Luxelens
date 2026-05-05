<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            padding: 30px;
            border: 1px solid #D4AF37;
            border-radius: 12px;
            background-color: #fff;
            max-width: 600px;
            margin: auto;
        }

        .header {
            background: #000;
            color: #D4AF37;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .content {
            padding: 20px;
            border: 1px solid #eee;
            border-top: none;
        }

        .footer {
            font-size: 12px;
            color: #777;
            margin-top: 20px;
            text-align: center;
        }

        .detail-box {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }

        .status {
            font-weight: bold;
            color: #D4AF37;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2 style="margin:0;">LuxeLens Photography</h2>
        </div>
        <div class="content">
            <h3>Halo, {{ $details['nama'] }}!</h3>
            <p>Terima kasih telah melakukan reservasi di <strong>LUXELENS</strong>. Pesanan Anda telah kami terima dan
                sedang dalam antrean untuk dikonfirmasi.</p>

            <div class="detail-box">
                <p style="margin: 5px 0;"><strong>Detail Pesanan:</strong></p>
                <hr style="border: 0; border-top: 1px solid #ddd;">
                <p><strong>Kategori:</strong> {{ ucfirst($details['kategori']) }}</p>
                <p><strong>Tanggal Pemotretan:</strong> {{ date('d F Y', strtotime($details['tanggal'])) }}</p>
                <p><strong>Status:</strong> <span class="status">Menunggu Konfirmasi</span></p>
            </div>

            <p>Admin kami akan segera menghubungi Anda melalui WhatsApp atau Email untuk detail teknis selanjutnya.</p>

            <p style="font-size: 13px; color: #666;">*Email ini juga dikirimkan ke tim admin kami sebagai laporan
                otomatis.</p>
        </div>
        <div class="footer">
            <p>&copy; 2026 LuxeLens Photography. All Rights Reserved.</p>
        </div>
    </div>
</body>

</html>
