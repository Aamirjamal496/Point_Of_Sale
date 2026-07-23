<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\InventoryTransaction;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\SaleItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use League\CommonMark\Reference\Reference;

class salesController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $categories = Category::with('Products')->get();
        $customers = Customer::get();
        // return $customers->first()->name;
        return view('POS_Sales.index', compact(['products', 'categories', 'customers']));
        // return $categories;
    }

    public function checkout(Request $request)
    {
        // return $request->all();
        // echo $request;
        DB::beginTransaction();
        try {

            $sale = Sale::create([
                'invoice_no' => 'INV' . time(),
                'customer_id' => $request->customerId,
                'user_id' => Auth::id(),
                'subtotal' => $request->subtotal,
                'discount' => $request->discount,
                'grandtotal' => $request->total,
                'paymentmethod' => $request->payment_method,
                'amountpaid' => $request->amount_paid,
                'notes' => 'Sales',
            ]);
            foreach ($request->cart  as $item) {
                $product_id = $item['id'];
                $product = Product::findOrFail($product_id);
                if ($product->stock < $item['quantity']) {
                    throw new \Exception('Insufficient stock for' . $product->product_name);
                }
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'sellingprice' => $item['price'],
                    'subtotal' => $item['price'] * $item['quantity']
                ]);
                $product->stock -= $item['quantity'];
                $product->save();
                $stockbefore = $product->stock;
                $quantity = $item['quantity'];
                $stockafter = $stockbefore - $quantity;
                InventoryTransaction::create([
                    // 'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'type' => 'sale',
                    'quantity' => $quantity,
                    'stock_before' => $stockbefore,
                    'stock_after' => $stockafter,
                    'reference_type' => $sale->invoice_no,
                ]);
                }
                DB::commit();
                return response()->json([
                    'success' => true,
                    'sale_id' => $sale->id,
                    'invoice_id' => $sale->invoive_no,
                ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function invoice(Request $request,int $id)
    {
        $sale = Sale::with(['items.product', 'customer', 'User'])->findOrFail($id);
        return  view('POS_Sales.invoice', compact('sale'));
    }
    public function showreports(){
        $invoice_count = Sale::count();
        $sales = Sale::sum('grandtotal');
        $total_purchase= DB::table('purchase_items')->sum(DB::raw('quantity * cost_price'));
        $profit = DB::table('products')->sum(DB::raw('selling_price - purchase_price'));
        // return $profit;
        return view('Reports.index',compact(['invoice_count','sales','total_purchase','profit']));
    }
    public function generateReport(Request $request){
        // return $request;
        $start_date=$request->start_date;
        $end_date=$request->end_date;
        $Report_type = $request->report_type;
        // return $Report_type;
        if($Report_type == "Sales Report"){
            $report_Ondate =Sale::with("customer")->whereBetween("created_at",[$start_date,$end_date])->get(); 
        }elseif($Report_type === "Purchase Report"){
            $report_Ondate =Purchase::with("PurchaseItems")->whereBetween("created_at",[$start_date,$end_date])->get(); 
        }elseif($Report_type === "Inventory Report"){
            $report_Ondate =InventoryTransaction::with("Product")->whereBetween("created_at",[$start_date,$end_date])->get();
        }
        // return $report_Ondate;
        return view("Reports.sales",compact("report_Ondate","Report_type"));
    }
}
