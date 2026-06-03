@extends('layouts.app')

@section('content')
<h1>Tracking Pesanan #{{ $order->id }}</h1>

<div style="padding: 20px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 8px; margin-bottom: 20px;">
    <h3>Status Saat Ini: <span style="color: blue;">{{ ucfirst($order->status) }}</span></h3>
    
    <!-- Visualisasi Status -->
    <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <div style="text-align: center;">
            <div style="font-size: 24px;">{{ $order->status == 'pending' ? '🟢' : '⚪' }}</div>
            <p>Menunggu Konfirmasi</p>
        </div>
        <div style="text-align: center;">
            <div style="font-size: 24px;">{{ $order->status == 'processing' ? '🟢' : '' }}</div>
            <p>Sedang Dimasak</p>
        </div>
        <div style="text-align: center;">
            <div style="font-size: 24px;">{{ $order->status == 'completed' ? '🟢' : '⚪' }}</div>
            <p>Selesai / Diantar</p>
        </div>
    </div>
</div>

<h3>Detail Item:</h3>
<table border="1" cellpadding="5">
    @foreach($order->items as $item)
    <tr>
        <td>{{ $item->menu_name }}</td>
        <td>{{ $item->quantity }} x Rp {{ number_format($item->price) }}</td>
    </tr>
    @endforeach
</table>
@endsection