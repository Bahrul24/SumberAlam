@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="container px-3 my-5 clearfix">
    <div class="card">
        <div class="card-header">
            <h2>Shopping Cart</h2>
        </div>
        <div class="card-body">
            @if($cart && count($cart) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <th class="text-center py-3 px-4">Nama Produk &amp; Detail</th>
                                <th class="text-right py-3 px-4">Harga</th>
                                <th class="text-center py-3 px-4">Jumlah</th>
                                <th class="text-right py-3 px-4">Total</th>
                                <th class="text-center py-3 px-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $productId => $details)
                                <tr>
                                    <td class="p-4">
                                        <div class="media align-items-center">
                                            <img src="{{ asset($details['image']) }}" class="d-block ui-w-40 ui-bordered mr-4" alt="{{ $details['name'] }}">
                                            <div class="media-body">
                                                <a href="#" class="d-block text-dark">{{ $details['name'] }}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right align-middle p-4">
                                        ${{ number_format($details['price'], 2) }}
                                    </td>
                                    <td class="align-middle p-4">{{ $details['quantity'] }}</td>
                                    <td class="text-right align-middle p-4">
                                        ${{ number_format($details['price'] * $details['quantity'], 2) }}
                                    </td>
                                    <td class="text-center align-middle px-0">
                                        <a href="{{ route('cart.remove', $productId) }}" class="text-danger" title="Hapus">×</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center">Keranjang belanja kosong.</p>
            @endif
        </div>
    </div>
</div>
@endsection