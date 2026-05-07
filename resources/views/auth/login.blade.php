<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - TOBUKEL</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins', sans-serif;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            position:relative;
            background:#f6f1e9;
        }

        /* Background */
        body::before{
            content:"";
            position:absolute;
            inset:0;
            background:
                linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)),
                url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=1974&auto=format&fit=crop');
            background-size:cover;
            background-position:center;
            filter:blur(2px);
            transform:scale(1.05);
        }

        /* Overlay */
        .overlay{
            position:absolute;
            inset:0;
            background:linear-gradient(
                135deg,
                rgba(111,78,55,0.80),
                rgba(55,35,20,0.85)
            );
        }

        .login-wrapper{
            width:100%;
            max-width:1200px;
            padding:40px;
            position:relative;
            z-index:10;
        }

        .login-container{
            display:grid;
            grid-template-columns:1fr 480px;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(20px);
            -webkit-backdrop-filter:blur(20px);
            border:1px solid rgba(255,255,255,0.12);
            border-radius:35px;
            overflow:hidden;
            box-shadow:0 20px 60px rgba(0,0,0,0.35);
        }

        /* LEFT */
        .left-side{
            padding:70px;
            color:white;
            display:flex;
            flex-direction:column;
            justify-content:center;
            position:relative;
        }

        .top-badge{
            width:max-content;
            padding:10px 18px;
            border-radius:50px;
            background:rgba(255,255,255,0.12);
            border:1px solid rgba(255,255,255,0.15);
            font-size:14px;
            margin-bottom:25px;
            backdrop-filter:blur(10px);
        }

        .brand{
            font-size:64px;
            font-weight:800;
            line-height:1;
            margin-bottom:20px;
            letter-spacing:-2px;
        }

        .brand span{
            color:#ffcf8b;
        }

        .description{
            max-width:500px;
            color:rgba(255,255,255,0.8);
            line-height:1.8;
            font-size:15px;
            margin-bottom:35px;
        }

        .feature-box{
            display:flex;
            gap:20px;
            flex-wrap:wrap;
        }

        .feature{
            padding:14px 20px;
            border-radius:18px;
            background:rgba(255,255,255,0.08);
            border:1px solid rgba(255,255,255,0.1);
            color:white;
            font-size:14px;
        }

        /* RIGHT */
        .right-side{
            background:#fffaf3;
            padding:55px 45px;
            display:flex;
            align-items:center;
        }

        .login-card{
            width:100%;
        }

        .login-title{
            font-size:34px;
            font-weight:700;
            color:#5c3b24;
            margin-bottom:10px;
        }

        .login-subtitle{
            color:#9b7b65;
            font-size:14px;
            margin-bottom:35px;
            display:block;
        }

        .form-group{
            margin-bottom:22px;
        }

        .form-label{
            display:block;
            margin-bottom:10px;
            color:#6a4a36;
            font-weight:600;
            font-size:14px;
        }

        .form-input{
            width:100%;
            height:58px;
            border:none;
            outline:none;
            border-radius:18px;
            padding:0 20px;
            background:#f4ede5;
            font-size:15px;
            color:#5a3b28;
            transition:0.3s ease;
            border:2px solid transparent;
        }

        .form-input:focus{
            border-color:#a06a43;
            background:white;
            box-shadow:0 0 0 5px rgba(160,106,67,0.12);
        }

        .form-input::placeholder{
            color:#b09a88;
        }

        .btn-login{
            width:100%;
            height:58px;
            border:none;
            border-radius:18px;
            background:linear-gradient(
                135deg,
                #8b5e3c,
                #6f4a2f
            );
            color:white;
            font-size:15px;
            font-weight:700;
            cursor:pointer;
            margin-top:10px;
            transition:0.3s ease;
            box-shadow:0 12px 25px rgba(111,74,47,0.25);
        }

        .btn-login:hover{
            transform:translateY(-3px);
            box-shadow:0 18px 30px rgba(111,74,47,0.35);
        }

        .back-home{
            display:flex;
            justify-content:center;
            margin-top:25px;
        }

        .back-home a{
            color:#8a6b55;
            text-decoration:none;
            font-size:14px;
            transition:0.3s;
        }

        .back-home a:hover{
            color:#6b4226;
        }

        /* Responsive */
        @media(max-width:950px){

            .login-container{
                grid-template-columns:1fr;
            }

            .left-side{
                display:none;
            }

            .right-side{
                padding:40px 30px;
            }

            .login-wrapper{
                padding:20px;
            }
        }

    </style>
</head>
<body>

    <div class="overlay"></div>

    <div class="login-wrapper">

        <div class="login-container">

            <!-- LEFT -->
            <div class="left-side">

                <div class="top-badge">
                    📚 Dashboard Administrator
                </div>

                <h1 class="brand">
                    TOBU<span>KEL</span>
                </h1>

                <p class="description">
                    Kelola toko buku online Anda dengan lebih mudah, modern,
                    dan profesional. Pantau buku, transaksi, customer,
                    serta seluruh aktivitas toko dalam satu dashboard.
                </p>

                <div class="feature-box">
                    <div class="feature">📖 Kelola Buku</div>
                    <div class="feature">🛒 Monitoring Order</div>
                    <div class="feature">📊 Statistik Penjualan</div>
                </div>

            </div>

            <!-- RIGHT -->
            <div class="right-side">

                <div class="login-card">

                    <h2 class="login-title">
                        Welcome Back 👋
                    </h2>

                    <span class="login-subtitle">
                        Silakan login untuk masuk ke dashboard admin TOBUKEL
                    </span>

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-input"
                                placeholder="admin@tobukel.com"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-input"
                                placeholder="••••••••"
                                required
                            >
                        </div>

                        <button type="submit" class="btn-login">
                            Sign In
                        </button>

                    </form>

                    <div class="back-home">
                        <a href="/">
                            ← Kembali ke Beranda
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>
