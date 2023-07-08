<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        return to_route('login')->withErrors(['email'=>'invalid email'])->onlyInput('email');
    }
    public function signup(){
        return view('clients.signup');
    }
    public function doSignup(ClientLoginRequest $request){
        //dd($user);
        $usercreate = User::create($this->extractData(new User(),$request));
        return redirect()->route('login');
    }
    public function logout(){
        Auth::logout();
        return to_route('login');
    }
    private function extractData(User $user,ClientLoginRequest $request):array
    {
        $data = $request->validated();
        /** @var UploadedFile|null $avatar */
        $avatar = $request->validated('avatar');
        if($avatar === null || $avatar->getError()){
            return $data;
        }
        if($user->avatar ){
            Storage::disk('public')->delete($user->avatar);
        }
        $data['avatar'] = $avatar->store('images','public');
        return $data;
    }
}
