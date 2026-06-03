@extends('layouts.app')

@section('content')
<h1>Riwayat Pesanan</h1>

@if($orders->isEmpty())
    <p>Belum ada pesanan. <a href="{{ route('menu.index') }}>Pesan sekarang</a></p>
@else
    <table border="1" cellpadding="10" style="width:100%; border-collapse:collapse;">
        <thead>
            <tr>
                <th>No. Order</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td>
                    <span style="padding:3px 8px; background:{{ $order->status=='pending'?'#ffc107':'#28a745' }}; color:#fff; border-radius:3px;">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td><a href="{{ route('order.detail', $order->id) }}">Lihat Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
@endif
@endsection