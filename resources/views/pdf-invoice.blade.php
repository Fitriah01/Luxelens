<!DOCTYPE html>
<html>
<head>
    <style>
    body { font-family: 'Helvetica', sans-serif; color: #333; line-height: 1.6; }
    .brand { font-size: 32px; letter-spacing: 10px; text-align: center; font-weight: bold; border-bottom: 2px solid gold; padding-bottom: 15px; margin-bottom: 30px; }

    .meta-box { width: 100%; margin-bottom: 40px; }
    .meta-box td { font-size: 12px; color: #888; text-transform: uppercase; }

    .content-table { width: 100%; border-collapse: collapse; margin-bottom: 50px; }
    .content-table th { background: #f9f9f9; text-align: left; padding: 12px; font-size: 11px; border-bottom: 1px solid #ddd; }
    .content-table td { padding: 15px 12px; border-bottom: 1px solid #eee; font-size: 14px; }

    .total-section { text-align: right; margin-top: 30px; border-top: 1px solid #000; padding-top: 10px; }
    .pending-stamp {
        border: 3px solid red; color: red; padding: 10px 20px; display: inline-block;
        font-weight: bold; font-size: 20px; transform: rotate(-15deg);
        opacity: 0.3; position: absolute; bottom: 150px; right: 50px;
    }
</style>
</head>
<body>
    <div class="brand">LUXELENS</div>

    <div class="meta">
        Order ID: #{{ $booking->id }} <br>
        Issued: {{ date('d / m / Y') }}
    </div>

    <table class="content-table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Customer Name</td>
                <td><strong>{{ strtoupper($booking->nama_customer) }}</strong></td>
            </tr>
            <tr>
                <td>Service Category</td>
                <td>{{ $booking->kategori }} Photography</td>
            </tr>
            <tr>
                <td>Session Date</td>
                <td>{{ date('l, d F Y', strtotime($booking->tanggal_pemotretan)) }}</td>
            </tr>
            <tr>
                <td>Package</td>
                <td>Classy Cinematic Package</td>
            </tr>
        </tbody>
    </table>

    <div style="text-align: right;">
        <div class="status-stamp">{{ strtoupper($booking->status) }}</div>
    </div>

    <div class="footer">
        THANK YOU FOR CHOOSING OUR VISION. <br>
        LuxeLens Photography MANAGEMENT SYSTEM
    </div>
</body>
</html>
