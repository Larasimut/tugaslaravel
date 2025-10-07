<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $buku = [
            ['judul' => 'Laskar Pelangi', 'penulis' => 'Andrea Hirata', 'tahun' => 2005],
            ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'tahun' => 1980],
            ['judul' => 'Negeri 5 Menara', 'penulis' => 'Ahmad Fuadi', 'tahun' => 2009],
            ['judul' => 'Pulang', 'penulis' => 'Tere Liye', 'tahun' => 2015],
            ['judul' => 'Dilan 1990', 'penulis' => 'Pidi Baiq', 'tahun' => 2014],
        ];

        // kirim data ke view
        return view('home', compact('buku'));
    }
}
