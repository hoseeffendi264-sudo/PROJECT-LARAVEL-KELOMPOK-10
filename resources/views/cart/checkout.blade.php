@extends('layouts.app')

@section('content')
<h1>Checkout Pesanan</h1>

@if(session('error'))
    <div class="alert-error">{{ session('error') }}</div>
@endif

<div style="margin-bottom: 20px;">
    <h3>📋 Ringkasan Pesanan:</h3>
    <table>
        <thead>
            <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = 0;
                $cart = session('cart', []);
            @endphp
            @foreach($cart as $id => $item)
                @php 
                    $subtotal = $item['price'] * $item['quantity']; 
                    $total += $subtotal; 
                @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-right"><strong>Total Pembayaran:</strong></td>
                <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
</div>

<h3>📦 Informasi Pengiriman:</h3>
<form action="{{ route('order.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name">Nama Lengkap:</label>
        <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="phone">No. Telepon:</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="address">Alamat Lengkap:</label>
        <textarea id="address" name="address" rows="4" required>{{ old('address', Auth::user()->address ?? '') }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">✅ Konfirmasi & Buat Pesanan</button>
    <a href="{{ route('cart.index') }}" class="btn" style="background: #6c757d;">← Kembali ke Keranjang</a>
</form>
@endsection