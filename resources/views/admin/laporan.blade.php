<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | LUXELENS</title>
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,700,900|inter:100,300,400,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --gold: #D4AF37;
            --card-bg: #0a0a0a;
        }

        body {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 100%);
            color: #e0e0e0;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen py-8">
    <div class="container mx-auto py-8 px-4">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-3xl font-bold mb-6">{{ $title }}</h1>

            <!-- Filter Section -->
            <div class="mb-6 flex gap-4 flex-wrap">
                <a href="{{ route('laporan.index', ['filter' => 'hari']) }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Hari Ini
                </a>
                <a href="{{ route('laporan.index', ['filter' => 'minggu']) }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Minggu Ini
                </a>
                <a href="{{ route('laporan.index', ['filter' => 'bulan']) }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Bulan Ini
                </a>
                <a href="{{ route('laporan.index', ['filter' => 'tahun']) }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Tahun Ini
                </a>
                <a href="{{ route('laporan.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    Semua Data
                </a>
            </div>

            <!-- Tombol Cetak PDF -->
            <div class="mb-6">
                <a href="{{ route('laporan.cetak', request()->query()) }}"
                    class="px-6 py-3 bg-green-500 text-white rounded hover:bg-green-600">
                    📥 Cetak PDF
                </a>
            </div>

            <!-- Table Section -->
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Booking Code</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Nama Customer</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Kategori</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Pemotretan</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Harga</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Tanggal Booking</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr class="hover:bg-gray-100">
                                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 px-4 py-2 font-mono text-sm">
                                    {{ $booking->booking_code }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $booking->nama_customer }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ ucfirst($booking->kategori) }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $booking->tanggal_pemotretan }}</td>
                                <td class="border border-gray-300 px-4 py-2 font-semibold">
                                    Rp {{ number_format($booking->harga, 0, ',', '.') }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    @if ($booking->status === 'Lunas')
                                        <span class="px-2 py-1 bg-green-200 text-green-800 rounded text-sm">Lunas</span>
                                    @elseif ($booking->status === 'Pending')
                                        <span
                                            class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded text-sm">Pending</span>
                                    @elseif ($booking->status === 'Rejected')
                                        <span class="px-2 py-1 bg-red-200 text-red-800 rounded text-sm">Rejected</span>
                                    @else
                                        <span
                                            class="px-2 py-1 bg-gray-200 text-gray-800 rounded text-sm">{{ $booking->status }}</span>
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $booking->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="border border-gray-300 px-4 py-4 text-center text-gray-500">
                                    Tidak ada data booking untuk periode yang dipilih.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Total Summary -->
            <div class="mt-6 bg-gray-100 p-4 rounded">
                <p class="text-lg font-bold">
                    Total Pendapatan (Lunas):
                    <span class="text-green-600">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</span>
                </p>
                <p class="text-sm text-gray-600 mt-2">Periode: {{ $title }}</p>
            </div>

            <!-- Kembali ke Dashboard -->
            <div class="mt-6">
                <a href="{{ route('admin.dashboard') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                    ← Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</body>

</html>
