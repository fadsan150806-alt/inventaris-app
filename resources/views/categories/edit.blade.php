@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <h1>Edit Kategori</h1>
        <p class="page-description">
            Perbarui informasi kategori yang dipilih.
        </p>
    </div>
</div>

<div class="card form-card">
    <h2 class="section-heading">Informasi Kategori</h2>
    <p class="section-description">
        Ubah nama kategori, lalu simpan perubahan.
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label" for="name">Nama Kategori</label>
            <input class="form-control"
                   id="name"
                   name="name"
                   value="{{ old('name', $category->name) }}"
                   maxlength="255"
                   required>
        </div>

        <div class="form-actions">
            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
            <a class="btn btn-secondary" href="{{ route('categories.index') }}">Batal</a>
        </div>
    </form>
</div>
@endsection
