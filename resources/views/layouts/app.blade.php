<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Inventaris App' }}</title>

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --sidebar: #172554;
            --background: #f5f7fb;
            --white: #ffffff;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
            --success: #15803d;
            --danger: #dc2626;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
            background: var(--background);
            color: var(--text);
            font-size: 14px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button, input, select {
            font: inherit;
        }

        .app {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 245px;
            flex-shrink: 0;
            background: var(--sidebar);
            color: #dbeafe;
            padding: 26px 16px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 30px;
            color: white;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: #2563eb;
            display: grid;
            place-items: center;
            font-size: 21px;
            font-weight: bold;
        }

        .brand-name {
            font-size: 17px;
            font-weight: 700;
        }

        .brand-subtitle {
            font-size: 11px;
            color: #94a3b8;
            margin-top: 4px;
        }

        .nav-label {
            color: #94a3b8;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            padding: 0 12px;
            margin: 8px 0 12px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 5px;
            color: #cbd5e1;
            transition: .2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #263b70;
            color: white;
        }

        .nav-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding: 20px 10px 0;
            color: #94a3b8;
            font-size: 12px;
            line-height: 1.7;
        }

        .main {
            min-width: 0;
            flex: 1;
        }

        .topbar {
            min-height: 76px;
            padding: 16px 32px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .topbar-title {
            font-size: 18px;
            font-weight: 700;
        }

        .topbar-subtitle {
            color: var(--muted);
            font-size: 12px;
            margin-top: 5px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            background: #dbeafe;
            color: #1d4ed8;
            font-weight: 700;
            border-radius: 50%;
        }

        .user-name {
            font-weight: 600;
        }

        .user-role {
            color: var(--muted);
            font-size: 12px;
            margin-top: 3px;
        }

        .content {
            max-width: 1450px;
            padding: 30px 32px;
            margin: auto;
        }

        .page-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .page-heading h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: -.5px;
        }

        .page-description {
            color: var(--muted);
            margin: 8px 0 0;
            line-height: 1.6;
        }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 2px 5px rgba(15, 23, 42, .025);
            min-width: 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 22px;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .stat-label {
            color: var(--muted);
            font-size: 13px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: #eff6ff;
            font-size: 20px;
        }

        .stat-number {
            font-size: 29px;
            font-weight: 750;
            margin-top: 18px;
        }

        .stat-note {
            color: var(--muted);
            font-size: 12px;
            margin-top: 6px;
        }

        .section-heading {
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 5px;
        }

        .section-description {
            color: var(--muted);
            margin: 0 0 20px;
            line-height: 1.6;
        }

        .quick-links {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .quick-link {
            display: block;
            padding: 18px;
            border: 1px solid var(--border);
            border-radius: 10px;
            transition: .2s;
        }

        .quick-link:hover {
            border-color: #93c5fd;
            background: #f8fbff;
        }

        .quick-link strong {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .quick-link span {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            border: 0;
            border-radius: 8px;
            padding: 10px 15px;
            font-weight: 600;
            cursor: pointer;
            font-size: 13px;
            transition: .2s;
        }

        .btn-primary {
            color: white;
            background: var(--primary);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            color: #334155;
            background: #f1f5f9;
        }

        .btn-edit {
            color: #1d4ed8;
            background: #eff6ff;
        }

        .btn-danger {
            color: #b91c1c;
            background: #fef2f2;
        }

        .btn-danger:hover {
            background: #fee2e2;
        }

        .btn-small {
            padding: 7px 10px;
            font-size: 12px;
        }

        .table-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 18px;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        th {
            background: #f8fafc;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-weight: 700;
        }

        th, td {
            padding: 15px 13px;
            text-align: left;
            border-bottom: 1px solid #edf0f5;
        }

        td {
            font-size: 13px;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        tbody tr:last-child td {
            border-bottom: 0;
        }

        .item-name {
            font-weight: 650;
            color: #1e293b;
        }

        .muted {
            color: var(--muted);
        }

        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            background: #eff6ff;
            color: #1d4ed8;
        }

        .stock-badge {
            display: inline-block;
            min-width: 32px;
            text-align: center;
            padding: 5px 8px;
            border-radius: 6px;
            background: #f1f5f9;
            color: #334155;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .inline-form {
            display: inline;
            margin: 0;
        }

        .alert {
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 18px;
            line-height: 1.6;
        }

        .alert-success {
            color: #166534;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
        }

        .alert-danger {
            color: #991b1b;
            background: #fef2f2;
            border: 1px solid #fecaca;
        }

        .form-card {
            max-width: 720px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 650;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background: white;
            color: var(--text);
            outline: none;
            transition: .2s;
        }

        .form-control:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px #dbeafe;
        }

        .form-help {
            display: block;
            font-size: 12px;
            color: var(--muted);
            margin-top: 7px;
        }

        .field-error {
            color: #b91c1c;
            font-size: 12px;
            margin-top: 7px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            padding-top: 5px;
        }

        .empty-state {
            text-align: center;
            color: var(--muted);
            padding: 35px 15px;
        }

        .pagination {
            margin-top: 20px;
        }

        .logout-button {
            background: transparent;
            color: #cbd5e1;
            border: 0;
            padding: 12px;
            text-align: left;
            cursor: pointer;
            width: 100%;
            border-radius: 8px;
        }

        .logout-button:hover {
            background: #263b70;
            color: white;
        }

        @media (max-width: 900px) {
            .sidebar { width: 205px; }
            .content { padding: 24px 20px; }
            .topbar { padding: 16px 20px; }
            .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 640px) {
            .app { display: block; }
            .sidebar { width: 100%; padding: 15px; }
            .brand { padding: 0 5px 15px; }
            .nav-label, .sidebar-bottom { display: none; }
            .sidebar nav {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 5px;
            }
            .nav-link {
                margin: 0;
                padding: 10px 5px;
                justify-content: center;
                flex-direction: column;
                gap: 5px;
                font-size: 11px;
                text-align: center;
            }
            .sidebar > form { margin-top: 8px; }
            .logout-button { padding: 8px; text-align: center; }
            .topbar { min-height: 65px; padding: 13px 16px; }
            .user-details { display: none; }
            .content { padding: 22px 14px; }
            .page-heading h1 { font-size: 21px; }
            .stats-grid { grid-template-columns: 1fr; gap: 12px; }
            .stat-card { padding: 18px; }
            .quick-links { grid-template-columns: 1fr; }
            .card { padding: 15px; }
        }
    </style>
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <a href="{{ route('dashboard') }}" class="brand">
            <div class="brand-icon">I</div>
            <div>
                <div class="brand-name">Inventaris</div>
                <div class="brand-subtitle">Management System</div>
            </div>
        </a>

        <div class="nav-label">MENU UTAMA</div>

        <nav>
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ ($active ?? '') === 'dashboard' ? 'active' : '' }}">
                <span class="nav-icon">▦</span>
                Dashboard
            </a>

            <a href="{{ route('categories.index') }}"
               class="nav-link {{ ($active ?? '') === 'categories' ? 'active' : '' }}">
                <span class="nav-icon">▤</span>
                Kategori
            </a>

            <a href="{{ route('items.index') }}"
               class="nav-link {{ ($active ?? '') === 'items' ? 'active' : '' }}">
                <span class="nav-icon">▣</span>
                Data Barang
            </a>
        </nav>

        <div class="sidebar-bottom">
            <div>Inventaris App</div>
            <div>Manajemen data barang</div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-button" type="submit">↪ &nbsp; Keluar dari aplikasi</button>
        </form>
    </aside>

    <div class="main">
        <header class="topbar">
            <div>
                <div class="topbar-title">{{ $title ?? 'Dashboard' }}</div>
                <div class="topbar-subtitle">Sistem Manajemen Inventaris</div>
            </div>

            <div class="user-info">
                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="user-details">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-role">Administrator</div>
                </div>
            </div>
        </header>

        <main class="content">
            @if (session('success'))
                <div class="alert alert-success">
                    ✓ &nbsp; {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
