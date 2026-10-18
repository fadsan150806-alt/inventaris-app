@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <h1>Data Barang</h1>
        <p class="page-description">
            Pantau barang, harga, kategori, dan jumlah stok.
        </p>
    </div>

    <a href="{{ route('items.create') }}" class="btn btn-primary">
        + Tambah Barang
    </a>
</div>

<div class="card">
    <div class="table-toolbar">
        <div>
            <h2 class="section-heading">Daftar Inventaris</h2>
            <p class="section-description" style="margin:6px 0 0">
                Total {{ $items->total() }} jenis barang.
            </p>
        </div>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $items->firstItem() + $loop->index }}</td>
                        <td>
                            <span class="item-name">{{ $item->name }}</span>
                        </td>
                        <td>
                            <span class="badge">{{ $item->category->name }}</span>
                        </td>
                        <td>
                            Rp {{ number_format((float) $item->price, 0, ',', '.') }}
                        </td>
                        <td>
                            <span class="stock-badge">{{ number_format($item->stock) }}</span>
                        </td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-edit btn-small"
                                   href="{{ route('items.edit', $item) }}">
                                    Edit
                                </a>

                                <form class="inline-form"
                                      action="{{ route('items.destroy', $item) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-small"
                                            type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <strong>Belum ada barang</strong>
                                <p>Tambahkan barang untuk mengisi data inventaris.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">{{ $items->links() }}</div>
</div>
@endsection
