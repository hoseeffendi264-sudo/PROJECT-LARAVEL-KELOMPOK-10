<?php
namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.dashboard', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.dashboard')->with('success', 'Status pesanan berhasil diupdate!');
    }
}