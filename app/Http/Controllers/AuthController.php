<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::attempt($validated)) {
            return redirect()->route('Panel');
        } else {
            return redirect()->back('/login');
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
        return view('Admin.Dashboard');
    }
}
