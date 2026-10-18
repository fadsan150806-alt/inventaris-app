@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <h1>Tambah Barang</h1>
        <p class="page-description">
            Tambahkan barang baru ke dalam inventaris.
        </p>
    </div>
</div>

<div class="card form-card">
    <h2 class="section-heading">Informasi Barang</h2>
    <p class="section-description">
        Isi semua informasi barang dengan benar.
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Data belum dapat disimpan.</strong>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @if ($categories->isEmpty())
        <div class="alert alert-danger">
            Belum ada kategori. Buat kategori terlebih dahulu.
        </div>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            + Tambah Kategori
        </a>
    @else
        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">Nama Barang</label>
                <input class="form-control"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Contoh: Keyboard"
                       maxlength="255"
                       required>
            </div>

            <div class="form-group">
                <label class="form-label" for="category_id">Kategori</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Pilih kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @selected(old('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="price">Harga (Rp)</label>
                <input class="form-control"
                       id="price"
                       type="number"
                       name="price"
                       min="0.01"
                       step="0.01"
                       value="{{ old('price') }}"
                       placeholder="Contoh: 150000"
                       required>
            </div>

            <div class="form-group">
                <label class="form-label" for="stock">Jumlah Stok</label>
                <input class="form-control"
                       id="stock"
                       type="number"
                       name="stock"
                       min="0"
                       step="1"
                       value="{{ old('stock', 0) }}"
                       placeholder="Masukkan jumlah stok"
                       required>
            </div>

            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Simpan Barang</button>
                <a class="btn btn-secondary" href="{{ route('items.index') }}">Batal</a>
            </div>
        </form>
    @endif
</div>
@endsection
