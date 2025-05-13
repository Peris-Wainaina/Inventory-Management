<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Stationery;
use Illuminate\Http\Request;

class StationeryController extends Controller
{
    public function index()
    {
        $stationeries = Stationery::all();
        return view('stationery', compact('stationeries'));
    }
    public function order(Request $request)
    {
        $request->validate([
            'stationery_id' => 'required|exists:stationery,id',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $item = Stationery::find($request->stationery_id);
    
        if ($item->quantity < $request->order_quantity) {
            return back()->with('error', 'Not enough stock available.');
        }


        Order::create([
            'user_id' => auth()->id(),
            'stationery_id' => $item->id,
            'item_name' => $item->item_name,
            'quantity' => $request->quantity,
            'status' => 'pending',
        ]);
    
        return back()->with('success', 'Order placed successfully.');
}
public function showOrders()
    {
        $orders = Order::latest()->get(); 
        return view('order', compact('orders'));
    }

    public function stock()
    {
        $stationeries = Stationery::all();
        return view('stock', compact('stationeries'));
    }
    public function approveOrder($id)
{
    $order = Order::findOrFail($id);
    $item = Stationery::findOrFail($order->stationery_id);

    if ($item->quantity < $order->quantity) {
        return back()->with('error', 'Not enough stock to approve this order.');
    }

    // Reduce stock
    $item->quantity -= $order->quantity;
    $item->save();

    // Update order status
    $order->status = 'approved';
    $order->save();

    return back()->with('success', 'Order approved and stock updated.');
}

public function rejectOrder($id)
{
    $order = Order::findOrFail($id);
    $order->status = 'rejected';
    $order->save();

    return back()->with('success', 'Order rejected.');
}
public function userOrderStatus()
{
    $orders = Order::where('user_id', auth()->id())
                   ->latest()
                   ->get();

    return view('orderStatus', compact('orders'));
}
}
