<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockAdjustment;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('Inventory.index', ['products' => $products]);
    }
    public function historyPage()
    {
        return view('Inventory.history');
    }
    public function add()
    {
        $products = Product::get();
        return view('Inventory.adjust', compact('products'));
    }
    public function storeAdjustment(Request $request)
    {
        // return $request->input('role');
        $products =  Product::findOrFail($request->product_id);
        if ($request->adjustment_type === 'add') {
            $products->stock += $request->quantity;
        } else {
            $products->stock -= $request->quantity;
        }
        $products->save();
        // $user_role = $request->session()->get('user_role');
        // return $user_role[0];
        StockAdjustment::create([
            'product_id' => $products->id,
            'adjustment_type' => $request->adjustment_type,
            'quantity' => $request->quantity,
            'reason' => $request->reason,
            'notes' => $request->notes,
            'role' => $request->role,
        ]);
        return redirect('/inventory')->with('Success', 'Adjustment Done');
    }
}
