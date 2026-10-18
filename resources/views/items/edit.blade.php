@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <h1>Edit Barang</h1>
        <p class="page-description">
            Perbarui informasi barang inventaris.
        </p>
    </div>
</div>

<div class="card form-card">
    <h2 class="section-heading">Informasi Barang</h2>
    <p class="section-description">
        Pastikan nama, kategori, harga, dan stok sudah benar.
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali data kamu.</strong>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="name">Nama Barang</label>
            <input class="form-control"
                   id="name"
                   name="name"
                   value="{{ old('name', $item->name) }}"
                   maxlength="255"
                   required>
        </div>

        <div class="form-group">
            <label class="form-label" for="category_id">Kategori</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Pilih kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('category_id', $item->category_id) == $category->id)>
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
                   value="{{ old('price', $item->price) }}"
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
                   value="{{ old('stock', $item->stock) }}"
                   required>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
            <a class="btn btn-secondary" href="{{ route('items.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection
