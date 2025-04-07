<?php

namespace App\Http\Controllers;
use App\Models\Stationery;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function addStockForm($id)
    {
        $stationery = Stationery::findOrFail($id);
        return view('stationery.addStock', compact('stationery'));
    }

    // Handle adding stock
    public function addStock(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $stationery = Stationery::findOrFail($id);

        // Add stock to the 'stock' table
        Stock::create([
            'stationery_id' => $stationery->id,
            'change_type' => 'add',
            'quantity' => $validated['quantity'],
        ]);

        // Optionally, update any other table or perform additional logic
        return redirect()->route('stationery.index')->with('success', 'Stock added successfully!');
    }
}
