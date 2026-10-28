<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Upload Foto - UKK Gallery</title>
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
            max-width: 500px;
            margin: 50px auto;
            background: white;
            border: 1px solid #dbdbdb;
            padding: 30px;
            border-radius: 8px;
        }

        .container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #dbdbdb;
            border-radius: 4px;
            font-family: inherit;
        }

        .btn-simpan {
            background-color: #3b82f6;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .btn-batal {
            background-color: #ef4444;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            display: block;
            text-decoration: none;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    @include('layouts.topbar')

    <div class="container">
        <h2>Upload Foto Baru</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- PERHATIAN: wajib ada enctype="multipart/form-data" untuk form upload file -->
        <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="JudulFoto" placeholder="Judul Foto" required>
            <textarea name="DeskripsiFoto" placeholder="Deskripsi Foto" rows="3" required></textarea>

            <!-- Dropdown untuk memilih album -->
            <select name="album_id" required>
                <option value="" disabled selected>-- Pilih Album --</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}">{{ $album->NamaAlbum }}</option>
                @endforeach
            </select>

            <label style="font-size: 14px; font-weight: bold; display: block; margin-bottom: 5px;">Pilih Gambar:</label>
            <!-- Input tipe file -->
            <input type="file" name="LokasiFile" accept="image/*" required>

            <button type="submit" class="btn-simpan">Unggah Foto</button>
            <a href="{{ route('album.index') }}" class="btn-batal">Batal</a>
        </form>
    </div>

</body>

</html>
