@extends('layouts.app')

@section('content')
<h1>Checkout Pesanan</h1>

<h3>Detail Pesanan:</h3>
<table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
    @foreach($cart as $id => $item)
    <tr>
        <td>{{ $item['name'] }} ({{ $item['quantity'] }}x)</td>
        <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
    </tr>
    @endforeach
    <tr>
        <td align="right"><strong>Total:</strong></td>
        <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
    </tr>
</table>

<h3>Form Pemesanan:</h3>
<form action="{{ route('order.store') }}" method="POST">
    @csrf
    
    <div style="margin-bottom: 15px;">
        <label>Nama:</label><br>
        <input type="text" name="name" required style="width: 100%; padding: 8px;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label>No. Telepon:</label><br>
        <input type="text" name="phone" required style="width: 100%; padding: 8px;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label>Alamat Pengantaran:</label><br>
        <textarea name="address" required style="width: 100%; padding: 8px; height: 80px;"></textarea>
    </div>
    
    <button type="submit">Konfirmasi Pesanan</button>
    <a href="{{ route('cart.index') }}">← Kembali</a>
</form>
@endsection