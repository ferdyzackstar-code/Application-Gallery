<?php

namespace App\Http\Controllers;

use App\Models\LikeFoto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeFotoController extends Controller
{
    public function like($id)
    {
        // Cek dulu di database, apakah user ini sudah pernah like foto ini?
        $cekLike = LikeFoto::where('foto_id', $id)->where('user_id', Auth::id())->first();

        if ($cekLike) {
            // Jika sudah ada (berarti dia mau Un-like), maka hapus datanya
            $cekLike->delete();
        } else {
            // Jika belum ada, maka buat data like baru
            LikeFoto::create([
                'foto_id' => $id,
                'user_id' => Auth::id(),
                'TanggalLike' => date('Y-m-d'),
            ]);
        }

        // Setelah proses selesai, kembalikan user ke halaman sebelumnya (beranda)
        return back();
    }
}
