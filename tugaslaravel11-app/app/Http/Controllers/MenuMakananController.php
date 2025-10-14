<?php

namespace App\Http\Controllers;

use App\Models\MenuMakanan;
use Illuminate\Http\Request;

class MenuMakananController extends Controller
{
    // 🧾 Tampilkan semua data
    public function index()
    {
        $menu = MenuMakanan::all();
        return view('menu.index', compact('menu'));
    }

    // ➕ Tampilkan form tambah data
    public function create()
    {
        return view('menu.create');
    }

    // 💾 Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|max:100',
            'kategori' => 'required|max:50',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string'
        ]);

        MenuMakanan::create($request->all());
        return redirect('/menu')->with('success', 'Menu berhasil ditambahkan!');
    }

    // ✏️ Tampilkan form edit
    public function edit($id)
    {
        $menu = MenuMakanan::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    // 🔄 Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required|max:100',
            'kategori' => 'required|max:50',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'nullable|string'
        ]);

        $menu = MenuMakanan::findOrFail($id);
        $menu->update($request->all());

        return redirect('/menu')->with('success', 'Menu berhasil diperbarui!');
    }

    // ❌ Hapus data
    public function destroy($id)
    {
        $menu = MenuMakanan::findOrFail($id);
        $menu->delete();

        return redirect('/menu')->with('success', 'Menu berhasil dihapus!');
    }
}
