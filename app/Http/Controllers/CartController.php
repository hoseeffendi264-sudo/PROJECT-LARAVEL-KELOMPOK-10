<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

public function order(Request $request)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'address' => 'required',
    ]);

    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->route('menu.index')->with('error', 'Keranjang kosong!');
    }

    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    $order = Order::create([
        'user_id' => Auth::id(), // null jika guest
        'customer_name' => $request->name,
        'customer_phone' => $request->phone,
        'customer_address' => $request->address,
        'total_price' => $total,
        'status' => 'pending',
    ]);

    foreach ($cart as $id => $item) {
        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $id,
            'menu_name' => $item['name'],
            'price' => $item['price'],
            'quantity' => $item['quantity'],
            'subtotal' => $item['price'] * $item['quantity'],
        ]);
    }

    session()->forget('cart');

    return redirect()->route('order.detail', $order->id)
        ->with('success', 'Pesanan berhasil dibuat!');
}