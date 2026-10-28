<style>
    /* CSS Khusus Topbar */
    .navbar {
        background: #ffffff;
        border-bottom: 1px solid #dbdbdb;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .logo {
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        color: #262626;
    }

    .nav-icons {
        display: flex;
        gap: 20px;
        font-size: 20px;
        align-items: center;
    }

    .nav-icons a {
        text-decoration: none;
        color: #262626;
    }

    .btn-logout {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 20px;
    }
</style>

<nav class="navbar">
    <a href="/" class="logo">Application Gallery</a>
    <div class="nav-icons">
        <a href="/" title="Beranda">🏠</a>
        <a href="{{ route('foto.create') }}" title="Tambah Foto">➕</a>
        <a href="{{ route('album.index') }}" title="Profil & Album">👤</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn-logout" title="Logout">🚪</button>
        </form>
    </div>
</nav>
