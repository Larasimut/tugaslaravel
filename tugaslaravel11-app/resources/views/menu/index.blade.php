<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu Makanan</title>
    <style>
        /* === Tampilan dasar === */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url("{{ asset('images/bg.jpeg') }}") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 30px;
            color: #333;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* === Judul === */
        h1 {
            text-align: center;
            color: #fff;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.5);
            margin-bottom: 30px;
            background: rgba(0, 0, 0, 0.4);
            padding: 15px;
            border-radius: 10px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        /* === Tombol tambah === */
        .btn-tambah {
            display: block;
            width: 220px;
            text-align: center;
            margin: 0 auto 25px auto;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }

        .btn-tambah:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        /* === Pesan sukses === */
        .alert {
            text-align: center;
            background-color: rgba(212, 237, 218, 0.85);
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 25px;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            backdrop-filter: blur(4px);
        }

        /* === Tabel === */
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.25);
            overflow: hidden;
        }

        th, td {
            padding: 14px 18px;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            text-align: center;
        }

        th {
            background-color: rgba(0, 123, 255, 0.9);
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:hover {
            background-color: rgba(240, 240, 240, 0.85);
        }

        .no-data {
            text-align: center;
            padding: 25px;
            font-style: italic;
            color: #555;
        }

        /* === Tombol aksi === */
        .aksi {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .aksi a, .aksi button {
            text-decoration: none;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
            font-weight: 500;
        }

        .btn-edit {
            background-color: #ffc107;
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #e0a800;
            transform: scale(1.05);
        }

        .btn-hapus {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-hapus:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <h1>🍽️ Daftar Menu Makanan</h1>

    {{-- ✅ Tampilkan pesan sukses kalau ada --}}
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- ➕ Tombol Tambah Menu --}}
    <a href="/menu/create" class="btn-tambah">+ Tambah Menu</a>

    {{-- 📋 Tabel Daftar Menu --}}
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Menu</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($menu as $item)
                <tr>
                    <td>{{ $item->id_menu }}</td>
                    <td>{{ $item->nama_menu }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>{{ $item->deskripsi ?? '-' }}</td>
                    <td>
                        <div class="aksi">
                            <a href="/menu/{{ $item->id_menu }}/edit" class="btn-edit">Edit</a>
                            <form action="/menu/{{ $item->id_menu }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="no-data">Belum ada data menu makanan 😅</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
