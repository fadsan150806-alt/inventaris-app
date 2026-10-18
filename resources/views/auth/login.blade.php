<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Inventaris App</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #1e293b;
            background: #f4f7fc;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 26px;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            border-radius: 13px;
            background: #1d4ed8;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .brand-title {
            font-size: 21px;
            font-weight: 750;
        }

        .brand-subtitle {
            color: #64748b;
            font-size: 12px;
            margin-top: 4px;
        }

        .login-card {
            background: white;
            padding: 34px;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 12px 35px rgba(15, 23, 42, .06);
        }

        h1 {
            font-size: 25px;
            margin: 0 0 9px;
        }

        .description {
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
            margin: 0 0 28px;
        }

        .form-group { margin-bottom: 20px; }

        label {
            display: block;
            font-size: 13px;
            font-weight: 650;
            margin-bottom: 8px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #475569;
            margin-bottom: 23px;
        }

        .remember input { accent-color: #2563eb; }

        .login-button {
            width: 100%;
            padding: 13px;
            border: 0;
            border-radius: 8px;
            background: #1d4ed8;
            color: white;
            font-size: 14px;
            font-weight: 650;
            cursor: pointer;
        }

        .login-button:hover { background: #1e40af; }

        .alert {
            padding: 12px;
            border-radius: 8px;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .alert-error {
            color: #991b1b;
            background: #fef2f2;
            border: 1px solid #fecaca;
        }

        .alert-success {
            color: #166534;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
        }

        .footer {
            margin-top: 22px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
        }

        @media (max-width: 480px) {
            .login-card { padding: 25px 20px; }
        }
    </style>
</head>
<body>
    <main class="login-container">
        <div class="brand">
            <div class="brand-icon">I</div>
            <div>
                <div class="brand-title">Inventaris App</div>
                <div class="brand-subtitle">Management System</div>
            </div>
        </div>

        <section class="login-card">
            <h1>Selamat datang</h1>
            <p class="description">
                Masuk ke akun kamu untuk mengelola data inventaris barang.
            </p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@inventaris.test"
                        autocomplete="username"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <label class="remember">
                    <input type="checkbox" name="remember" value="1">
                    Ingat saya
                </label>

                <button type="submit" class="login-button">
                    Masuk ke Dashboard →
                </button>
            </form>
        </section>

        <div class="footer">
            Inventaris App &copy; {{ date('Y') }}
        </div>
    </main>
</body>
</html>
