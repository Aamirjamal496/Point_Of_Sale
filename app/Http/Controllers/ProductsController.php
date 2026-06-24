<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('Products.products');
    }
    public function edit_Form()
    {
        return view('Products.edit');
    }
    public function add_Form()
    {
        return view('Products.add');
    }
}
