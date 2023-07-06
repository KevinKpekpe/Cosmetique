<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('clients.connexion');
    }
    public function doLogin(Request $request){
        $credentialsvalidate = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','min:4']
        ]);
        $credentials = $credentialsvalidate;
        //dd($credentials);
        //demande d'authentication
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('welcome'));
        }
        return to_route('auth.login')->withErrors(['email'=>'invalid email'])->onlyInput('email');
    }
    public function signup(){
        return view('clients.signup');
    }
    public function doSignup(Request $request){
        $user = $request->validate(
            [
                "name" => ['required', 'min:8', 'string', 'max:255'],
                "email" => ['required','email', 'max:255', 'unique:users,email'],
                "password" => ['required', 'string', 'min:8', 'max:30', 'confirmed']
            ]
        );
        //dd($user);
        $usercreate = User::create([
            "name" => $user['name'],
            "email" => $user['email'],
            "password" => bcrypt($user['password'])
        ]);
        return redirect()->route('login');
    }
    public function logout(){
        Auth::logout();
        return to_route('login');
    }
}
