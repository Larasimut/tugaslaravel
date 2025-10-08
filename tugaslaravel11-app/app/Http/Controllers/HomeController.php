<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 🏠 Halaman utama
    public function index(Request $request)
    {
        $buku = [
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'tahun' => 2005],
            ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'tahun' => 1980],
            ['judul' => 'Negeri 5 Menara', 'penulis' => 'Ahmad Fuadi', 'tahun' => 2009],
            ['judul' => 'Pulang', 'penulis' => 'Tere Liye', 'tahun' => 2015],
            ['judul' => 'Dilan 1990', 'penulis' => 'Pidi Baiq', 'tahun' => 2014],
        ];

        // ✅ Ambil pesan dari session (hasil redirect)
        $message = old('message');

        // Kirim data ke view
        return view('home', compact('buku', 'message'));
    }

    // 📝 Tampilkan form tambah pesan
    public function create()
    {
        return view('form');
    }

    // 💾 Simpan pesan dari form
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Ambil isi pesan
        $message = $request->input('message');

        // Redirect ke home sambil kirim data
        return redirect()->route('home')->withInput(['message' => $message]);
    }
}
