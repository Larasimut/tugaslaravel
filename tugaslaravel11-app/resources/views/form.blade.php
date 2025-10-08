<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pesan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-card {
            background: rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 1em;
        }
        button {
            background: #5a3a7d;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            transition: background 0.3s;
        }
        button:hover {
            background: #764ba2;
        }
        a {
            display: block;
            margin-top: 15px;
            color: #fff;
            text-decoration: underline;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="form-card">
        <h2>Tambah Pesan</h2>
        <form method="POST" action="{{ route('storeMessage') }}">
            @csrf
            <input type="text" name="message" placeholder="Tulis pesan Anda di sini..." required>
            <button type="submit">Kirim Pesan</button>
        </form>

        <a href="{{ route('home') }}">← Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
