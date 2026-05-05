<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }} | LUXELENS</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400&display=swap"
        rel="stylesheet">
    <style>
        body {
            background: #050505;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 50px;
            text-align: center;
        }

        .back-link {
            color: #666;
            text-decoration: none;
            font-size: 12px;
            display: block;
            margin-bottom: 30px;
            text-align: left;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            letter-spacing: 5px;
            margin-bottom: 50px;
            text-transform: uppercase;
        }

        /* Grid Koleksi */
        .collection-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .item {
            height: 400px;
            background: #0a0a0a;
            overflow: hidden;
            border: 1px solid #111;
        }

        .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.5s;
            opacity: 0.7;
        }

        .item:hover img {
            transform: scale(1.1);
            opacity: 1;
        }

        /* Jika foto kosong */
        .empty-state {
            color: #333;
            margin-top: 100px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <a href="/gallery" class="back-link">← KEMBALI KE GALLERY</a>
    <h1>{{ $title }}</h1>

    <div class="collection-grid">
        @forelse($photos as $foto)
            <div class="item">
                <img src="{{ asset('img/gallery/' . $foto->filename) }}" alt="Collection Item">
            </div>
        @empty
            <div class="empty-state">Belum ada koleksi foto untuk kategori ini.</div>
        @endforelse
    </div>
</body>

</html>
