<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Admin - TOBUKEL</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: "Poppins", sans-serif;
            background: #f4f6fb;
            color: #18233f;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 16px;
        }

        .register-card {
            width: 100%;
            max-width: 920px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 18px 50px rgba(24, 35, 63, 0.12);
            overflow: hidden;
        }

        .register-header {
            padding: 28px 32px;
            background: #7a4c2c;
            color: #fff;
        }

        .register-header h1 {
            font-size: 26px;
            margin-bottom: 6px;
        }

        .register-header p {
            opacity: .88;
            font-size: 14px;
        }

        form {
            padding: 32px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #d9deea;
            border-radius: 8px;
            padding: 12px 14px;
            font: inherit;
            color: #18233f;
        }

        textarea {
            resize: vertical;
        }

        .full {
            grid-column: 1 / -1;
        }

        .errors {
            margin-bottom: 20px;
            padding: 14px 18px;
            border-radius: 8px;
            background: #fff1f1;
            color: #b42318;
            font-size: 14px;
        }

        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-top: 24px;
        }

        .btn {
            border: 0;
            border-radius: 999px;
            padding: 12px 22px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background: #1572e8;
            color: #fff;
        }

        .link {
            color: #1572e8;
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 720px) {
            .grid {
                grid-template-columns: 1fr;
            }

            .actions {
                align-items: stretch;
                flex-direction: column-reverse;
            }

            .btn {
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="register-card">
        <div class="register-header">
            <h1>Daftar Admin TOBUKEL</h1>
            <p>Akun admin baru akan aktif setelah di-approve oleh admin utama.</p>
        </div>

        <form action="{{ route('admin.register.post') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($errors->any())
                <div class="errors">
                    <strong>Data belum valid.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid">
                <div>
                    <label for="name">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div>
                    <label for="phone">No. HP</label>
                    <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required>
                </div>
                <div>
                    <label for="profile_photo">Foto Profil</label>
                    <input id="profile_photo" type="file" name="profile_photo" accept="image/*" required>
                </div>
                <div>
                    <label for="birth_date">Tanggal Lahir</label>
                    <input id="birth_date" type="date" name="birth_date" value="{{ old('birth_date') }}" required>
                </div>
                <div>
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="">Pilih gender</option>
                        <option value="Laki-laki" @selected(old('gender') === 'Laki-laki')>Laki-laki</option>
                        <option value="Perempuan" @selected(old('gender') === 'Perempuan')>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>
                <div>
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required>
                </div>
                <div class="full">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('login') }}" class="link">Sudah punya akun?</a>
                <button class="btn btn-primary" type="submit">Kirim Pendaftaran Admin</button>
            </div>
        </form>
    </div>
</body>

</html>
