<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KomentarFoto;
use Illuminate\Support\Facades\Auth;

class KomentarFotoController extends Controller
{
    public function komentar(Request $request, $id)
    {
        // 1. Validasi agar komentar tidak boleh kosong
        $request->validate([
            'IsiKomentar' => 'required',
        ]);

        // 2. Simpan komentar ke tabel komentar_fotos
        KomentarFoto::create([
            'foto_id' => $id,
            'user_id' => Auth::id(),
            'IsiKomentar' => $request->IsiKomentar,
            'TanggalKomentar' => date('Y-m-d'),
        ]);

        // 3. Kembalikan ke halaman beranda
        return back();
    }
}
