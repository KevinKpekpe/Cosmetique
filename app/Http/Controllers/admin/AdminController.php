<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function showAdminLoginForm()
    {
        return view('auth.admlogin');
    }
    public function adminlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (auth()->user()->admin == 1) {
                return redirect()->intended('admin.home');
            }else {
                return redirect()->back()->with('error', 'Vous n\'avez pas acess à cette page.');
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    public function adminlogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
