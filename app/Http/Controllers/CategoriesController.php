<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with('Products')->get();
        // $products = Category::with('Products')->count();
        $products=$categories->first()->products->count();
        // return $products;

        // $request->session()->get('user_role');
        return view('Categories.index', compact('categories','products'));
        // return $categories;
    }
    public function details(int $id){
        $category = Category::with('Products')->findOrFail($id);
        // return $category;
        return view('Categories.details',['category'=>$category]);
    }
    public function add_Category(Request $request)
    {
        // return 'Add Category';
        $category = new Category();
        $category->name = $request->cat_name;
        if ($category->save()) {
            // $request->session()->flash();
            return redirect()->back()->with('success', 'New Category Added');
        } else {
            // $request->session()->flash();
            return redirect()->back()->with('failed', 'New Category Added');
        }
    }
    public function destroy(int $id)
    {
        $delete_cat = Category::destroy($id);
        if ($delete_cat) {
            return redirect()->back()->with('success', 'Category Deleted');
        } else {

            return redirect()->back()->with('error', 'Category Deletion Failed');
        }
    }
}
