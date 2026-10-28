<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    // Menampilkan daftar album milik user yang sedang login
    public function index()
    {
        // Ambil album yang dibuat oleh user ini saja
        $albums = Album::where('user_id', Auth::id())->get();
        return view('album.index', compact('albums'));
    }

    public function create()
    {
        return view('album.create');
    }

    // Menyimpan data album baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_album' => 'required',
            'deskripsi' => 'required',
        ]);

        // Simpan data album
        Album::create([
            'NamaAlbum' => $request->nama_album,
            'Deskripsi' => $request->deskripsi,
            'TanggalDibuat' => date('Y-m-d'), // Ambil tanggal hari ini
            'user_id' => Auth::id(), // Ambil ID user yang sedang login
        ]);

        return redirect()->route('album.index')->with('success', 'Album berhasil dibuat!');
    }

    public function show($id)
    {
        $album = Album::with('fotos')->findOrFail($id);

        if ($album->user_id != Auth::id()) {
            return redirect()->route('album.index');
        }

        return view ('album.show', compact('album'));
    }
}