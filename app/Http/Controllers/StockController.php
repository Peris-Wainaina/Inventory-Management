<?php

namespace App\Http\Controllers;

use App\Models\Stationery;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $items = Stationery::all();
        return view('stock', compact('items'));
    }

    public function addStockForm($id)
    {
        $stationery = Stationery::findOrFail($id);
        return view('addStock', compact('stationery'));
    }

    public function addStock(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $stationery = Stationery::findOrFail($id);
        $stationery->quantity += $validated['quantity'];
        $stationery->save();

        return redirect()->route('stock.index')->with('success', 'Stock added successfully.');
    }

    public function reduceStock($id, $quantity)
    {
        $stationery = Stationery::findOrFail($id);

        if ($stationery->quantity >= $quantity) {
            $stationery->quantity -= $quantity;
            $stationery->save();

            return redirect()->route('stock.index')->with('success', 'Stock reduced successfully.');
        } else {
            return redirect()->route('stock.index')->with('error', 'Not enough stock.');
        }
    }
}
