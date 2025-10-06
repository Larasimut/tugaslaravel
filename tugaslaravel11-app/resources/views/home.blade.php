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
        p {
            color: #f0f0f0;
            font-size: 1.2em;
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.1);
            padding: 15px 30px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            animation: fadeInUp 1s ease-out 0.5s both;
        }
        .welcome-card {
            background: rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            max-width: 600px;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        /* Responsif untuk perangkat mobile */
        @media (max-width: 768px) {
            h1 {
                font-size: 2em;
            }
            p {
                font-size: 1em;
                padding: 10px 20px;
            }
            .welcome-card {
                padding: 20px;
                margin: 0 20px;
            }
        }
    </style>
</head>
<body>
    <div class="welcome-card">
        <h1>Selamat Datang di Halaman Home</h1>
        <p>Ini adalah tampilan home</p>
    </div>
</body>
</html>
