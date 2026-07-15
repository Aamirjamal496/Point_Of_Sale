<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with('Sale')->get();
        // $All_sale = Customer::withSum('Sale', 'grandtotal')->find($customers->first()->id);
        // return $All_sale;
        foreach ($customers as $customer) {
            $total_sale = $customer->sale->sum('grandtotal');
        }
        return view('Customers.index', compact(['customers', 'total_sale']));
    }
    public function show(int $id)
    {
        $customer = Customer::with('Sale')->findOrFail($id);
        // return $customer;
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
