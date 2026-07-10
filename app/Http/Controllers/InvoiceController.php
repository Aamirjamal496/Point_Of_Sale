<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Sale::with('customer')->latest()->paginate(10);
        // return $invoices;
        return view('invoices.index', compact('invoices'));
    }
    public function show($id)
    {
        $sales = Sale::with('items');
        $sale = $sales->findOrFail($id);
        return $sale;
        // return view('POS_Sales.invoice', compact('sale'));
    }
}
