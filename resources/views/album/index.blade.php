<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Profil & Album - UKK Gallery</title>
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

        /* Profil */
        .profile-header {
            display: flex;
            align-items: center;
            gap: 40px;
            margin-bottom: 40px;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            background-color: #d8dde1;
            border-radius: 50%;
        }

        .profile-info h2 {
            font-size: 28px;
            font-weight: normal;
            margin-bottom: 15px;
        }

        .profile-stats {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .profile-desc h4 {
            font-size: 16px;
            font-weight: bold;
        }

        .profile-desc p {
            font-size: 14px;
        }

        /* Area Album */
        .album-section {
            border-top: 1px solid #dbdbdb;
            padding-top: 20px;
        }

        .album-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .album-header h3 {
            font-size: 12px;
            color: #8e8e8e;
            letter-spacing: 1px;
        }

        .btn-buat-album {
            background-color: #3b82f6;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }

        /* Grid Album */
        .album-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .album-box {
            background-color: #e5e7eb;
            aspect-ratio: 1 / 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: #4b5563;
            font-weight: bold;
            text-decoration: none;
            transition: 0.2s;
        }

        .album-box:hover {
            opacity: 0.8;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Memanggil Topbar dari folder layouts -->
    @include('layouts.topbar')

    <div class="container">
        <!-- Notifikasi -->
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <!-- Bagian Profil -->
        <div class="profile-header">
            <div class="profile-pic"></div>
            <div class="profile-info">
                <h2>{{ Auth::user()->Username }}</h2>
                <div class="profile-stats">
                    <span><strong>{{ $albums->count() }}</strong> Albums</span>
                    <span><strong>0</strong> Photos</span>
                </div>
                <div class="profile-desc">
                    <h4>{{ Auth::user()->NamaLengkap }}</h4>
                    <p>{{ Auth::user()->Alamat }}</p>
                </div>
            </div>
        </div>

        <div class="album-section">
            <div class="album-header">
                <h3>📁 ALBUM SAYA</h3>
                <!-- Pindah ke halaman create murni tanpa JS -->
                <a href="{{ route('album.create') }}" class="btn-buat-album">+ Buat Album</a>
            </div>

            <!-- Kotak-kotak Album -->
            <div class="album-grid">
                @foreach ($albums as $album)
                    <!-- Nantinya kotak ini bisa diklik untuk melihat foto di dalam album tersebut -->
                    <a href="#" class="album-box">
                        {{ $album->NamaAlbum }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>
