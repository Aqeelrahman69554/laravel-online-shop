<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - TOBUKEL</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #1a2035;
            background: radial-gradient(circle at center, #232a45 0%, #101524 100%);
            font-family: 'Public Sans', sans-serif;
            color: #ffffff;
        }

        .login-card {
            /* Kotak dibuat lebih gelap & tidak terlalu menyala */
            background: rgba(30, 39, 59, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);

            width: 100%;
            max-width: 420px;
            padding: 50px 40px;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        .brand-logo {
            font-weight: 800;
            font-size: 2rem;
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .brand-logo span {
            color: #1572e8;
        }

        .subtitle {
            color: #8a99af;
            font-size: 0.95rem;
            margin-bottom: 40px;
            display: block;
        }

        /* Perbaikan agar tidak tabrakan */
        .form-group {
            margin-bottom: 25px; /* Memberi ruang antar input */
            text-align: left;
        }

        .form-label {
            display: block;
            font-weight: 700;
            color: #cbd5e1;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px; /* Jarak antara teks label dan kotak input */
            padding-left: 4px;
        }

        .form-input {
            width: 100%;
            padding: 14px 18px;
            background: rgba(15, 23, 42, 0.6); /* Kotak input lebih gelap */
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #ffffff;
            font-size: 15px;
            outline: none;
            box-sizing: border-box; /* Sangat penting agar padding tidak merusak lebar */
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: #1572e8;
            background: rgba(15, 23, 42, 0.9);
            box-shadow: 0 0 0 4px rgba(21, 114, 232, 0.15);
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: #1572e8;
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(21, 114, 232, 0.2);
        }

        .btn-login:hover {
            background: #187cf5;
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(21, 114, 232, 0.4);
        }

        .back-home {
            margin-top: 30px;
            display: block;
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .back-home:hover {
            color: #1572e8;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-logo">TOBU<span>KEL</span></div>
        <span class="subtitle">Silakan masuk ke panel administrasi</span>

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-input" placeholder="admin@tobukel.com" required>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-login">Sign In</button>
        </form>

        <a href="/" class="back-home">← Kembali ke Beranda</a>
    </div>

</body>
</html>
