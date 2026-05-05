<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pendapatan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2>Laporan Booking LUXELENS</h2>
    <p>Periode: {{ $label }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Tanggal Foto</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $b)
                <tr>
                    <td>{{ $b->nama_customer }}</td>
                    <td>{{ ucfirst($b->kategori) }}</td>
                    <td>{{ $b->tanggal_pemotretan }}</td>
                    <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                    <td>{{ $b->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        Total Pendapatan (Lunas): Rp {{ number_format($total, 0, ',', '.') }}
    </div>
</body>

</html>
