<?php

namespace App\Http\Controllers;

use App\Models\InventoryTransaction;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index()
    {
        // $purchases = Purchase::with("PurchaseItems")->get();
        // foreach ($purchases as $purchase) {
        //     $items = $purchase->purchase_Items;
        //     return $items
        // }
        // return $purchases->purchase_items;
        // $supplierid = $purchases->supplier_id;
        // $supplier_name = Supplier::findOrFail($supplierid);
        // return $supplier_name;
        return view("Purchases.index", compact("purchases"));
    }
    public function PurchaseForm()
    {
        $suppliers = Supplier::get();
        $products = Product::get();
        return view("Purchases.add", compact("suppliers", "products"));
    }
    public function editPurchase()
    {
        return view("Purchases.show");
    }
    public function CreatePurchase(Request $request)
    {
        DB::transaction(function () use ($request) {

            $purchase = Purchase::create([
                'supplier_id' => $request->supplier_id,
                'purchase_date' => $request->purchase_date,
                'total' => $request->total,
            ]);
            foreach ($request->product_id as $key => $productId) {
                $product = Product::findOrFail($productId);
                $oldStock = $product->stock;
                $quantity = $request->quantity[$key];
                $newStock = $oldStock + $quantity;
                // Update Stock
                $product->stock = $newStock;
                $product->save();
                // Save Purchase Item
                PurchaseItem::create([
                    'purchase_id' => $purchase->id,
                    'product_id' => $productId,
                    'quantity' => $request->quantity[$key],
                    'cost_price' => $request->cost[$key],
                    'subtotal' => $quantity * $request->cost[$key],
                ]);
                InventoryTransaction::create([
                    'product_id' => $productId,
                    'type' => 'purchase',
                    'quantity' => $quantity,
                    'stock_before' => $oldStock,
                    'stock_after' => $newStock,
                    'reference_type' => 'purchase',
                    'reference_id' => $purchase->id,
                ]);
            }
        });
        return redirect('')->with('', '');
    }
    // public function Createitems()
    // {
    //     return nothing;
    // }
}
