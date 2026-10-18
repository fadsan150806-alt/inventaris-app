@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <h1>Dashboard</h1>
        <p class="page-description">
            Ringkasan data dan aktivitas inventaris kamu.
        </p>
    </div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-top">
            <span class="stat-label">Total Kategori</span>
            <div class="stat-icon">▤</div>
        </div>
        <div class="stat-number">{{ number_format($totalCategories) }}</div>
        <div class="stat-note">Kategori terdaftar</div>
    </div>

    <div class="stat-card">
        <div class="stat-top">
            <span class="stat-label">Total Jenis Barang</span>
            <div class="stat-icon">▣</div>
        </div>
        <div class="stat-number">{{ number_format($totalItems) }}</div>
        <div class="stat-note">Jenis barang terdaftar</div>
    </div>

    <div class="stat-card">
        <div class="stat-top">
            <span class="stat-label">Total Stok</span>
            <div class="stat-icon">▥</div>
        </div>
        <div class="stat-number">{{ number_format($totalStock) }}</div>
        <div class="stat-note">Unit barang tersedia</div>
    </div>
</div>

<div class="card">
    <h2 class="section-heading">Akses Cepat</h2>
    <p class="section-description">
        Pilih menu berikut untuk mulai mengelola inventaris.
    </p>

    <div class="quick-links">
        <a href="{{ route('categories.index') }}" class="quick-link">
            <strong>▤ &nbsp; Manajemen Kategori →</strong>
            <span>
                Tambah, perbarui, dan kelola kategori barang.
            </span>
        </a>

        <a href="{{ route('items.index') }}" class="quick-link">
            <strong>▣ &nbsp; Manajemen Barang →</strong>
            <span>
                Kelola nama barang, kategori, harga, dan stok.
            </span>
        </a>
    </div>
</div>
@endsection
