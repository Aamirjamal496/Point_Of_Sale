<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('Customers.index', ['customers' => $customer]);
    }
    public function show($id)
    {
        $customer = Customer::findOrFail($id)->get();
        return view('Customers.show', ['customers' => $customer]);
    }
    public function addForm()
    {
        return view('Customers.add');
    }
    public function addCustomer(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|min:4|max:15',
            'phone' => 'required|string|min:7|max:14',
            'email' => 'required|email|unique:customers,email',
            'address' => 'required',
            'status' => 'required',
        ]);
        $addcustomer = Customer::create([
            'name' => $validate['name'],
            'phone' => $validate['phone'],
            'email' => $validate['email'],
            'address' => $validate['address'],
            'status' => $validate['status'],
        ]);
        if ($addcustomer) {
            return redirect('/customers')->with('success', 'Customer Added Successfully');
        } else {
            return redirect('/customers')->with('error', 'Addition Failed');
        }
    }
}
