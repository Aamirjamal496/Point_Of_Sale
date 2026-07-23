<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AuthController extends Controller
{
    public function index()
    {
        return view('Admin.login');
        if (View::exist()) {
        } else {
            return 'view not found';
        }
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user_role = User::where('email', $request->email)->get('role');
        // return $user_role;
        if (Auth::attempt($validated)) {
            $request->session()->put('user_role', $user_role);
            return redirect()->route('Panel')->with('success', 'Logged In Successfuly');
        } else {
            return redirect()->back()->with('error', 'Login Failed');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flash("success", "Logout Successfully");
        return redirect()->route("Login");
    }
    public function dashboard()
    {
        $products = Product::count();
        $customers = Customer::count();
        $recent_sale = Sale::latest()->first();
        // return $recent_sale;
        $low_stock = Product::whereColumn('stock', '<', 'min_stock')->simplePaginate(5);
        $today_sale = Sale::whereDate('created_at', Carbon::today())->sum('grandtotal');
        $monthlySales = Sale::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(grandtotal) as total')
        )->whereYear('created_at', date('Y'))->groupBy('month')->pluck('total', 'month');
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = $monthlySales[$i] ?? 0;
        }
        // Yearly Sales (Last 5 Years)
        $yearlySales = Sale::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('SUM(grandtotal) as total')
        )
            ->groupBy('year')
            ->orderBy('year')
            ->pluck('total', 'year');
            $yearlyLabels = $yearlySales->keys()->toArray();
$yearlyData = $yearlySales->values()->toArray();
        // return $monthlyData;
        // return $yearlySales;
        return view('Admin.Dashboard', compact('products', 'customers', 'recent_sale', 'low_stock', 'today_sale', 'monthlyData', 'yearlyLabels','yearlyData'));
    }
    // public function lowStockExcel(){
    //     return "dummy";
    // }
}
