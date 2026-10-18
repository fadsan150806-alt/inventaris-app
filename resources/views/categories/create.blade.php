@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <h1>Tambah Kategori</h1>
        <p class="page-description">
            Masukkan nama kategori baru.
        </p>
    </div>
</div>

<div class="card form-card">
    <h2 class="section-heading">Informasi Kategori</h2>
    <p class="section-description">
        Lengkapi formulir berikut untuk menyimpan kategori.
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali data kamu.</strong>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label" for="name">Nama Kategori</label>
            <input class="form-control"
                   id="name"
                   name="name"
                   value="{{ old('name') }}"
                   maxlength="255"
                   placeholder="Contoh: Perangkat Komputer"
                   required>

            <span class="form-help">
                Gunakan nama yang jelas dan mudah dikenali.
            </span>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Simpan Kategori</button>
            <a class="btn btn-secondary" href="{{ route('categories.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection
