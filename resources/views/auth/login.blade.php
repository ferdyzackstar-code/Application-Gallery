<!DOCTYPE html>
<html>

<head>
    <title>Login Galeri</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .kotak-login {
            background: white;
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 300px;
        }

        input {
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
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .success {
            color: green;
            font-size: 14px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="kotak-login">
        <h2 style="text-align: center;">Login</h2>

        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Masuk</button>
        </form>

        <p style="text-align: center; font-size: 14px;">
            Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        </p>
    </div>

</body>

</html>
