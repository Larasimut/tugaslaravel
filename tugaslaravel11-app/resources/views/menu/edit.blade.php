<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Makanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('{{ asset('images/bg.jpeg') }}') no-repeat center center fixed;
            background-size: cover;
            padding: 40px;
            margin: 0;
        }

        /* ✅ h1 benar-benar di tengah */
        h1 {
            text-align: center;
            color: #fff;
            background: rgba(0, 0, 0, 0.4);
            display: block;            /* ubah dari inline-block ke block */
            margin: 0 auto 30px;       /* supaya elemen-nya di tengah */
            padding: 10px 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
            width: fit-content;        /* biar background pas ngikutin panjang teks */
        }

        form {
            background: rgba(255, 255, 255, 0.9);
            padding: 25px;
            max-width: 500px;
            margin: 40px auto;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.25);
        }

        label {
            display: block;
            margin-top: 15px;
            color: #444;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
        }

        button {
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
            transition: 0.3s;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Edit Menu Makanan ✏️</h1>

    <form action="/menu/{{ $menu->id_menu }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Menu:</label>
        <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}" required>

        <label>Kategori:</label>
        <input type="text" name="kategori" value="{{ $menu->kategori }}" required>

        <label>Harga:</label>
        <input type="number" step="0.01" name="harga" value="{{ $menu->harga }}" required>

        <label>Stok:</label>
        <input type="number" name="stok" value="{{ $menu->stok }}" required>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" rows="3">{{ $menu->deskripsi }}</textarea>

        <button type="submit">💾 Simpan Perubahan</button>
        <a href="/menu">← Kembali</a>
    </form>

</body>
</html>
