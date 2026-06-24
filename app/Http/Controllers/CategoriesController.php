<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Categories.index', ['categories' => $categories]);
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
}
