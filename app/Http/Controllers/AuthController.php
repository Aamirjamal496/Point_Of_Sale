<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user_role = User::where('email', $request->email)->get('role');
        // return $user_role;
        if (Auth::attempt($validated)) {
            $request->session()->put('user_role', $user_role);
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
