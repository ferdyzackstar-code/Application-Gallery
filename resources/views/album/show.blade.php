<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Album: {{ $album->nama_album }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background-color: #fafafa;
            color: #262626;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .album-header {
            margin-bottom: 20px;
            border-bottom: 1px solid #dbdbdb;
            padding-bottom: 20px;
        }

        .album-header h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .album-header p {
            color: #8e8e8e;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .btn-kembali {
            background-color: #efefef;
            color: #262626;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        /* Grid Foto 3 Kolom */
        .photo-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .photo-item {
            aspect-ratio: 1 / 1;
            overflow: hidden;
            background-color: #efefef;
            border: 1px solid #dbdbdb;
        }

        .photo-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .empty-state {
            text-align: center;
            grid-column: 1 / -1;
            padding: 40px;
            color: #8e8e8e;
        }
    </style>
</head>

<body>

    @include('layouts.topbar')

    <div class="container">
        <div class="album-header">
            <h2>📁 {{ $album->nama_album }}</h2>
            <p>{{ $album->deskripsi }}</p>
            <a href="{{ route('album.index') }}" class="btn-kembali">⬅ Kembali ke Profil</a>
        </div>

        <div class="photo-grid">
            @forelse($album->fotos as $foto)
                <!-- Tambahkan position: relative di photo-item agar tombol silang bisa di pojok -->
                <div class="photo-item" style="position: relative;">
                    <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}"
                        title="{{ $foto->JudulFoto }}">

                    <!-- Tombol Hapus Foto (Muncul di pojok kanan atas gambar) -->
                    <form action="{{ route('foto.destroy', $foto->id) }}" method="POST"
                        style="position: absolute; top: 5px; right: 5px;"
                        onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            style="background: red; color: white; border: none; padding: 5px 8px; border-radius: 4px; cursor: pointer; font-weight: bold;">X</button>
                    </form>
                </div>
            @empty
                <div class="empty-state">
                    <p>Belum ada foto di album ini.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>

</html>
