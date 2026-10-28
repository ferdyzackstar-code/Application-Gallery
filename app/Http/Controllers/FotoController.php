<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    public function index ()
    {
        $fotos = Foto::with('user')->orderBy('id', 'desc')->get();
        return view('home', compact('fotos'));;
    }

    // Menampilkan halaman form tambah foto
    public function create()
    {
        // Ambil data album milik user ini, karena saat upload foto harus milih album
        $albums = Album::where('user_id', Auth::id())->get();

        return view('foto.create', compact('albums'));
    }

    // Memproses data foto dan file gambar
    public function store(Request $request)
    {
        // 1. Validasi inputan
        $request->validate([
            'JudulFoto' => 'required',
            'DeskripsiFoto' => 'required',
            'album_id' => 'required',
            'LokasiFile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Wajib file gambar, maksimal 2MB
        ]);

        // 2. Proses simpan file gambar ke folder (storage/app/public/images)
        $file = $request->file('LokasiFile');
        $namaFile = time() . '_' . $file->getClientOriginalName(); // Bikin nama file unik pakai waktu
        $file->storeAs('images', $namaFile, 'public'); // Simpan di folder public/images

        // 3. Simpan data ke database
        Foto::create([
            'JudulFoto' => $request->JudulFoto,
            'DeskripsiFoto' => $request->DeskripsiFoto,
            'TanggalUnggah' => date('Y-m-d'), // Otomatis tanggal hari ini
            'LokasiFile' => 'images/' . $namaFile, // Simpan path-nya ke database
            'album_id' => $request->album_id,
            'user_id' => Auth::id(),
        ]);

        // 4. Pindah ke halaman album dengan pesan sukses
        return redirect()->route('album.index')->with('success', 'Foto berhasil diunggah!');
    }
    
    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);

        if ($foto->user_id == Auth::id()) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($foto->LokasiFile);
            $foto->delete();
        }

        return back()->with('success', 'Foto berhasil dihapus!');
    }
}
