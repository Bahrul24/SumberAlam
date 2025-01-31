@extends('layouts.app')

@section('content')
<div class="container">
    @if(auth()->user()->hasRole('admin'))
        <!-- Konten yang hanya bisa dilihat oleh admin -->
        <h1>Arsip Produk</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('products.restore', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">Restore</button>
                            </form>
                            <form action="{{ route('products.forceDelete', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus Permanen</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada produk di Arsip.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $products->links() }}
    @else
        <!-- Konten untuk pengguna selain admin -->
        <p class="text-danger">Anda tidak memiliki akses ke halaman ini.</p>
    @endif
</div>
@endsection
