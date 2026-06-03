@extends('layouts.app')

@section('content')
<h1>🛡️ Dashboard Admin</h1>

<table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>ID Order</th>
            <th>Nama Customer</th>
            <th>Total</th>
            <th>Status</th>
            <th>Ubah Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->customer_name }}</td>
            <td>Rp {{ number_format($order->total_price) }}</td>
            <td>
                <span style="padding: 3px 8px; background: {{ $order->status == 'pending' ? 'orange' : 'green' }}; color: white;">
                    {{ ucfirst($order->status) }}
                </span>
            </td>
            <td>
                <form action="{{ route('admin.order.status', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" onchange="this.form.submit()" style="padding: 5px;">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection