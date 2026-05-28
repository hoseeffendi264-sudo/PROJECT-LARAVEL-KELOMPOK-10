@extends('layouts.app')

@section('content')
<h1>Keranjang Pesanan</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if(empty($cart))
    <p>Keranjang kosong. <a href="{{ route('menu.index') }}">Lihat menu</a></p>
@else
    <table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $id => $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" align="right"><strong>Total:</strong></td>
                <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
        </tfoot>
    </table>
    
    <br>
    <a href="{{ route('checkout') }}">Lanjut ke Checkout →</a>
@endif
@endsection