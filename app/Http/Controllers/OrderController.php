<?php

namespace App\Http\Controllers;
use App\Models\Stationery;
use App\Models\Stock;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the order request
        $validated = $request->validate([
            'stationery_id' => 'required|exists:stationery,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Get the stationery item
        $stationery = Stationery::find($validated['stationery_id']);

        // Check if enough stock is available
        $currentStock = $this->getAvailableStock($stationery->id);

        if ($currentStock < $validated['quantity']) {
            return response()->json(['error' => 'Not enough stock available'], 400);
        }

        // Reduce the stock by adding a "use" record
        Stock::create([
            'stationery_id' => $stationery->id,
            'change_type' => 'use',
            'quantity' => $validated['quantity'],
        ]);

        
        

        return response()->json(['success' => 'Order placed successfully']);
    }

    private function getAvailableStock($stationeryId)
    {

        $stockIn = Stock::where('stationery_id', $stationeryId)->where('change_type', 'add')->sum('quantity');
        $stockOut = Stock::where('stationery_id', $stationeryId)->where('change_type', 'use')->sum('quantity');

        return $stockIn - $stockOut;
    }
}
