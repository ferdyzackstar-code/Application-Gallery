<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Buat Album Baru - UKK Gallery</title>
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
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #dbdbdb;
            border-radius: 4px;
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
    </style>
</head>

<body>

    <!-- Memanggil Topbar -->
    @include('layouts.topbar')

    <div class="container">
        <h2>Buat Album Baru</h2>
        <form action="{{ route('album.store') }}" method="POST">
            @csrf
            <input type="text" name="nama_album" placeholder="Nama Album" required>
            <textarea name="deskripsi" placeholder="Deskripsi Album" rows="4" required></textarea>

            <button type="submit" class="btn-simpan">Simpan Album</button>
            <a href="{{ route('album.index') }}" class="btn-batal">Batal</a>
        </form>
    </div>

</body>

</html>
