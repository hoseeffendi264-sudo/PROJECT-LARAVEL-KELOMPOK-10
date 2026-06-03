<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items')->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        return view('orders.show', compact('order'));
    }

    public function track($id)
    {
        $order = Order::with('items')->findOrFail($id);
        
        if ($order->user_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('orders.track', compact('order'));
    }

    public function paymentProcess($id)
    {
        $order = Order::findOrFail($id);

        if ($order->user_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $order->update(['status' => 'processing']);

        return redirect()->route('order.track', $order->id)
            ->with('success', 'Pembayaran berhasil! Pesanan sedang diproses.');
    }
}