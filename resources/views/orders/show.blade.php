@extends('layouts.app')

@section('content')
<h1>Detail Pesanan #{{ $order->id }}</h1>

<div style="margin-bottom:20px;">
    <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
    <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
    <p><strong>Telepon:</strong> {{ $order->customer_phone }}</p>
    <p><strong>Alamat:</strong> {{ $order->customer_address }}</p>
    <p><strong>Status:</strong> 
        <span style="padding:3px 8px; background:{{ $order->status=='pending'?'#ffc107':'#28a745' }}; color:#fff;">
            {{ ucfirst($order->status) }}
        </span>
    </p>
</div>

<h3>Item Pesanan:</h3>
<table border="1" cellpadding="10" style="width:100%; border-collapse:collapse;">
    <thead>
        <tr>
            <th>Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $item->menu_name }}</td>
            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
            <td>{{ $item->quantity }}</td>
            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" align="right"><strong>Total:</strong></td>
            <td><strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong></td>
        </tr>
    </tfoot>
</table>

<br>
<a href="{{ route('orders.index') }}">← Kembali ke Daftar Pesanan</a>
@endsection