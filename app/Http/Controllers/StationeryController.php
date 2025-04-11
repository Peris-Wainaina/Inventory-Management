<?php

namespace App\Http\Controllers;

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
    
        $item->quantity -= $request->quantity;
        $item->save();

        Order::create([
            'stationery_id' => $item->id,
            'item_name' => $item->item_name,
            'quantity' => $request->quantity,
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
}
