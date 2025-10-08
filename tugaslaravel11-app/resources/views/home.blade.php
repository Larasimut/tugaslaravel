<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Buku - Perpustakaan Digital</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Daftar lengkap buku perpustakaan dengan fitur sorting dan pagination.">
    <meta name="keywords" content="buku, perpustakaan, judul, penulis, tahun">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #764ba2;
            --secondary-color: #667eea;
            --accent-color: #a8edea;
            --bg-gradient: linear-gradient(-45deg, #764ba2, #667eea, #f093fb, #f5576c);
            --bg-gradient-anim: linear-gradient(-45deg, #764ba2, #667eea, #a8edea, #764ba2);
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--bg-gradient);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            color: #333;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: grid;
            place-items: center;
            position: relative;
            overflow-x: hidden;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .floating-books {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        .book-float {
            position: absolute;
            width: 20px;
            height: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            animation: float 6s ease-in-out infinite;
        }
        .book-float:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
        .book-float:nth-child(2) { top: 60%; right: 15%; animation-delay: 2s; width: 15px; height: 25px; }
        .book-float:nth-child(3) { bottom: 30%; left: 20%; animation-delay: 4s; }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.5; }
            50% { transform: translateY(-20px) rotate(5deg); opacity: 1; }
        }
        .welcome-card {
            background: rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 900px;
            width: 100%;
            animation: fadeInUp 1s ease-out;
            position: relative;
            z-index: 1;
        }
        h1 {
            color: #fff;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        h1 i { color: #ffd700; animation: pulse 2s infinite; }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-out 0.5s both;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: var(--primary-color);
            color: white;
            cursor: pointer;
            user-select: none;
            transition: background 0.3s, transform 0.2s;
        }
        th:hover { 
            background: #5a3a7d; 
            transform: translateY(-1px);
        }
        th i { margin-left: 5px; opacity: 0.7; transition: opacity 0.3s; }
        th:hover i { opacity: 1; }
        tr:hover { background-color: rgba(118, 75, 162, 0.1); transition: background 0.3s; }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .page-btn {
            padding: 8px 12px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .page-btn:hover:not(:disabled) { 
            background: #5a3a7d; 
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .page-btn:disabled { 
            background: #ccc; 
            cursor: not-allowed; 
            transform: none;
        }
        .no-data {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }
        .no-data i { 
            font-size: 3em; 
            color: #ddd; 
            margin-bottom: 10px;
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .pesan {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 15px;
            border-radius: 10px;
            margin-top: 25px;
            text-align: center;
            font-size: 1.1em;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease-out;
        }
        @media (max-width: 768px) {
            body { padding: 10px; }
            h1 { font-size: 2em; flex-direction: column; gap: 5px; }
            table { 
                font-size: 0.85em; 
                overflow-x: auto; 
                display: block; 
                white-space: nowrap; 
            }
            th, td { min-width: 80px; padding: 8px; }
            .welcome-card { padding: 20px; }
            .floating-books .book-float { display: none; }
        }
    </style>
</head>
<body>
    <div class="floating-books">
        <div class="book-float"></div>
        <div class="book-float"></div>
        <div class="book-float"></div>
    </div>

    <div class="welcome-card">
        <h1><i class="fas fa-book"></i> Daftar Buku</h1>

        <a href="{{ route('form') }}" style="display:block; text-align:center; color:white; text-decoration:underline; margin-bottom:15px;">
            ➕ Tambah Pesan Baru
        </a>

        @if(isset($buku) && count($buku) > 0)
            <table role="table" aria-label="Daftar buku" id="booksTable">
                <thead>
                    <tr>
                        <th>No <i class="fas fa-sort"></i></th>
                        <th>Judul Buku <i class="fas fa-sort"></i></th>
                        <th>Penulis <i class="fas fa-sort"></i></th>
                        <th>Tahun <i class="fas fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody id="booksBody">
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

            <div class="pagination">
                <button class="page-btn" onclick="prevPage()" id="prevBtn" disabled><i class="fas fa-chevron-left"></i> Sebelumnya</button>
                <span id="pageInfo">Halaman 1 dari {{ ceil(count($buku) / 5) }}</span>
                <button class="page-btn" onclick="nextPage()" id="nextBtn">Selanjutnya <i class="fas fa-chevron-right"></i></button>
            </div>
        @endif

        {{-- 🟣 Pesan muncul di bawah tabel --}}
        @if (!empty($message))
            <div class="pesan">
                <strong>Pesan Kamu:</strong> {{ $message }}
            </div>
        @endif
    </div>

    <script>
        let booksData = @json($buku ?? []);
        let currentPage = 1;
        const itemsPerPage = 5;

        function displayBooks(data = booksData) {
            const tbody = document.getElementById('booksBody');
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginated = data.slice(start, end);

            tbody.innerHTML = '';
            paginated.forEach((book, index) => {
                const row = tbody.insertRow();
                row.innerHTML = `
                    <td>${start + index + 1}</td>
                    <td>${book.judul || 'Tidak diketahui'}</td>
                    <td>${book.penulis || 'Tidak diketahui'}</td>
                    <td>${book.tahun || 'Tidak diketahui'}</td>
                `;
            });

            updatePagination(data.length);
        }

        function nextPage() {
            if (currentPage < Math.ceil(booksData.length / itemsPerPage)) {
                currentPage++;
                displayBooks();
            }
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                displayBooks();
            }
        }

        function updatePagination(totalItems) {
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            document.getElementById('pageInfo').textContent = `Halaman ${currentPage} dari ${totalPages}`;
            document.getElementById('prevBtn').disabled = currentPage === 1;
            document.getElementById('nextBtn').disabled = currentPage === totalPages;
        }

        if (booksData.length > 0) displayBooks();
    </script>
</body>
</html>
