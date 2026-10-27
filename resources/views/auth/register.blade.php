<!DOCTYPE html>
<html>

<head>
    <title>Daftar Galeri</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .kotak-login {
            background: white;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 350px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-bottom: 10px;
            background: #ffe6e6;
            padding: 5px;
            border-radius: 3px;
        }
    </style>
</head>

<body>

    <div class="kotak-login">
        <h2 style="text-align: center;">Daftar Akun</h2>

        @if ($errors->any())
            <div class="error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" required>

            <label>Alamat</label>
            <textarea name="alamat" rows="3" required></textarea>

            <label>Password (minimal 6 huruf/angka)</label>
            <input type="password" name="password" required>

            <button type="submit">Daftar Sekarang</button>
        </form>

        <p style="text-align: center; font-size: 14px;">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
        </p>
    </div>

</body>

</html>
