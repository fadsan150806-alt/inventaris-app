@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <h1>Data Kategori</h1>
        <p class="page-description">
            Kelola pengelompokan barang inventaris.
        </p>
    </div>

    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        + Tambah Kategori
    </a>
</div>

<div class="card">
    <div class="table-toolbar">
        <div>
            <h2 class="section-heading">Daftar Kategori</h2>
            <p class="section-description" style="margin:6px 0 0">
                Total {{ $categories->total() }} kategori.
            </p>
        </div>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $categories->firstItem() + $loop->index }}</td>
                        <td>
                            <span class="item-name">{{ $category->name }}</span>
                        </td>
                        <td>
                            <span class="badge">
                                {{ $category->items_count }} barang
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-edit btn-small"
                                   href="{{ route('categories.edit', $category) }}">
                                    Edit
                                </a>

                                @if ($category->items_count == 0)
                                    <form class="inline-form"
                                          action="{{ route('categories.destroy', $category) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-small"
                                                type="submit">
                                            Hapus
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary btn-small"
                                            type="button"
                                            disabled
                                            title="Kategori masih digunakan oleh barang">
                                        Digunakan
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="empty-state">
                                <strong>Belum ada kategori</strong>
                                <p>Tambahkan kategori untuk mulai mengelompokkan barang.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">{{ $categories->links() }}</div>
</div>
@endsection
