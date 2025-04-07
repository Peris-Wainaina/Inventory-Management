<?php

namespace App\Http\Controllers;
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
            'order_quantity' => 'required|integer|min:1',
        ]);
    
        $item = Stationery::find($request->stationery_id);
    
        if ($item->quantity < $request->order_quantity) {
            return back()->with('error', 'Not enough stock available.');
        }
    
        $item->quantity -= $request->order_quantity;
        $item->save();
    
        return back()->with('success', 'Order placed successfully.');
}
public function showOrders()
    {
        return view('order');
    }

    public function stock()
    {
        $stationeries = Stationery::all();
        return view('stock', compact('stationeries'));
    }
}
