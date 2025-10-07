<!DOCTYPE html>
<html lang="id">
<head>
    <title>Halaman Utama</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            text-align: center;
            padding: 50px 20px;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1 {
            color: #fff;
            font-size: 3em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-out;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #764ba2;
            color: white;
        }
        tr:hover {
            background-color: rgba(118, 75, 162, 0.1);
        }
        .welcome-card {
            background: rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 700px;
            width: 100%;
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 768px) {
            h1 { font-size: 2em; }
            table { font-size: 0.9em; }
            .welcome-card { padding: 20px; margin: 0 10px; }
        }
    </style>
</head>
<body>
    <div class="welcome-card">
        <h1>Daftar Buku</h1>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buku as $index => $b)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $b['judul'] }}</td>
                        <td>{{ $b['penulis'] }}</td>
                        <td>{{ $b['tahun'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
