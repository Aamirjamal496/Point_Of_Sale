<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        // $image_path = [];
        // foreach ($products as $product) {
        //     $image_path[] = $product->product_image;
        // }
        // return $image_path;
        return view('Products.products', ['products' => $products]);
    }
    public function add_Form()
        {
            $suppliers = Supplier::pluck('supplier_name', 'id')->toArray();
            $categories = Category::pluck('name', 'id')->toArray();
            return view('Products.add', compact('suppliers', 'categories'));
        }
    // public function edit_Form(int $id){
    //     $product=Product::with('category')->findOrFail($id);
    //     return $product;
    //             // return view('Products.edit',compact('product'));
    // }
    public function edit_Form(){
        // $product=Product::with('category')->findOrFail($id);
        // return $product;
        return view('Products.edit');
    }
    public function edit_Values(int $id){
        $product=Product::with('category')->findOrFail($id);
        if(!$product){
            return response()->json(['error'=>'Product Not Found']);
        }
        return response()->json([
            'success'=>true,
            'product'=>$product
        ]);
    }
    public  function  update(Request $request){
        $product=Product::findorFail($request->id);
        $product->product_name = $request->pd_name;
        $product->purchase_price = $request->pd_cost;
        $product->selling_price = $request->pd_sale;
        $product->stock = $request->pd_stock;
       if(!$product->save()){
        return redirect()->back()->with('error','Updation Failed');
       }
        return redirect()->to('/products')->with('success','Product Updated');
    //    return $product->product_name;
    }
    public function store(Request $request)
    {

        // return $request;

        $image = $request->file('image');
        if ($image) {
            $path = $image->store('Product_Images', 'public');
            $filename = explode('/', $path);
            $filenameArray = $filename['1'];
            Product::create([
                'product_name' => $request->name,
                'category_id' => $request->category,
                'supplier_id' => $request->supplier,
                'sku' => 'PRD-' . strtoupper(uniqid()),
                'stock' => $request->stock,
                'purchase_price' => $request->purchase_price,
                'selling_price' => $request->selling_price,
                'product_image' => $filenameArray,
            ]);
            $request->session()->flash('success', 'Product Added Successfully');
            return redirect()->route('Products');
        } else {
            $request->session()->flash('error', 'Product Addition Failed');
            return redirect()->back();
        }
    }
    public function destroy(int $id)
    {
        $delete_product = Product::destroy($id);
        if ($delete_product) {
            return redirect()->back()->with('success', 'Product deleted');
        } else {
            return redirect()->back()->with('error', 'Product deletion failed');
        }
    }
}
