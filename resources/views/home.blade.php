<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Feed - UKK Gallery</title>
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

        /* Container Feed di tengah */
        .feed-container {
            max-width: 470px;
            margin: 30px auto;
            padding: 0 10px;
        }

        /* Card Postingan */
        .post-card {
            background: white;
            border: 1px solid #dbdbdb;
            border-radius: 8px;
            margin-bottom: 20px;
            overflow: hidden;
        }

        /* Header Postingan (Profil User) */
        .post-header {
            padding: 12px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .post-avatar {
            width: 32px;
            height: 32px;
            background-color: #d8dde1;
            border-radius: 50%;
        }

        .post-user {
            font-weight: bold;
            font-size: 14px;
            text-decoration: none;
            color: #262626;
        }

        /* Gambar Postingan */
        .post-image {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            display: block;
            background-color: #efefef;
        }

        /* Footer Postingan (Aksi & Deskripsi) */
        .post-footer {
            padding: 12px 15px;
        }

        .post-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        .post-likes {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
        }

        /* Deskripsi & Tanggal */
        .post-caption {
            font-size: 14px;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .post-date {
            font-size: 10px;
            color: #8e8e8e;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 15px;
        }

        /* Input Komentar */
        .post-comment-box {
            border-top: 1px solid #efefef;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .post-comment-box input {
            border: none;
            outline: none;
            width: 100%;
            padding: 5px 0;
            font-size: 14px;
        }

        .post-comment-box button {
            background: none;
            border: none;
            color: #0095f6;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
        }

        .empty-feed {
            text-align: center;
            margin-top: 50px;
            color: #8e8e8e;
        }
    </style>
</head>

<body>

    <!-- Panggil Topbar kita -->
    @include('layouts.topbar')

    <div class="feed-container">

        <!-- Looping semua foto dari database -->
        @forelse($fotos as $foto)
            <div class="post-card">
                <!-- Bagian Kepala (User) -->
                <div class="post-header">
                    <div class="post-avatar"></div>
                    <!-- Memanggil relasi user->username -->
                    <a href="#" class="post-user">{{ $foto->user->username }}</a>
                </div>

                <!-- Bagian Gambar -->
                <!-- Fungsi asset() memanggil file dari folder public/storage -->
                <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}" class="post-image">

                <!-- Bagian Bawah (Like, Komen, Deskripsi) -->
                <div class="post-footer">
                    <div class="post-actions">
                        <!-- Form untuk tombol Like -->
                        <form action="{{ route('foto.like', $foto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background:none; border:none; cursor:pointer; padding:0;">
                                <!-- Mengecek apakah user yang sedang login sudah me-like foto ini -->
                                @if ($foto->likes()->where('user_id', Auth::id())->count() > 0)
                                    ❤️
                                @else
                                    🤍
                                @endif
                            </button>
                        </form>

                        <!-- Ikon Komentar (biarkan dulu) -->
                        <span style="font-size: 24px; cursor: pointer; margin-left: 10px;">💬</span>
                    </div>

                    <!-- Menampilkan total jumlah like secara dinamis -->
                    <div class="post-likes">{{ $foto->likes()->count() }} Likes</div>

                    <div class="post-caption">
                        <strong>{{ $foto->user->username }}</strong> {{ $foto->DeskripsiFoto }}
                    </div>

                    <!-- Format tanggal sederhana -->
                    <div class="post-date">{{ $foto->TanggalUnggah }}</div>
                </div>

                <!-- Tempat ketik komentar (akan kita fungsikan nanti) -->
                <div class="post-comment-box">
                    <input type="text" placeholder="Tambahkan komentar...">
                    <button type="button">Post</button>
                </div>
            </div>
        @empty
            <div class="empty-feed">
                <h3>Belum ada postingan.</h3>
                <p>Jadilah yang pertama mengunggah foto!</p>
            </div>
        @endforelse

    </div>

</body>

</html>
