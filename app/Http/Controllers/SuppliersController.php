<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with('Products')->get();
        return view('Suppliers.index', ['suppliers' => $suppliers]);
        // return $suppliers;
    }
    public function add_Form()
    {
        return view('Suppliers.add');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'supp_name' => 'required|min:1|max:20',
            'contact_person' => 'required',
            'phone' => 'required|integer',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        $supplier = Supplier::create([
            'supplier_name' => $validate['supp_name'],
            'contact_person' => $validate['contact_person'],
            'phone' => $validate['phone'],
            'email' => $validate['email'],
            'address' => $validate['address'],
        ]);
        if ($supplier) {
            $request->session()->flash('success', 'Supplier Added Successfully');
            return redirect()->route('Suppliers');
        } else {
            $request->session()->flash('error', 'Failed to Add Supplier');
            return redirect()->route('Suppliers');
        }
    }
    public function destroy(Request $request, $id)
    {
        $supplier = Supplier::destroy($id);
        if ($supplier) {
            $request->session()->flash('success', 'Supplier deleted Successfully');
            return redirect()->route('Suppliers');
        } else {
            $request->session()->flash('error', 'Failed to delete Supplier');
            return redirect()->route('Suppliers');
        }
    }
}
