<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function signup(){
        return view('registration');
    }

    public function logincheck(LoginRequest $request){
        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
        $request->session()->regenerate();
        return redirect()->route('dashboard');
        } else {
        return back()
        ->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])
        ->withInput($request->only('email'));
    }
}

    public function registercheck(RegisterRequest $request){
        $user = User::create([
            'name' => $request->validated()['name'],
            'email' => $request->validated()['email'],
            'password' => $request->validated()['password'], 
        ]);

        return redirect()->route('login');
    }

    public function goDashboard(){
        if(Auth::check() && Auth::user()->usertype=='admin'){
            return view('admin.dashboard');
        }
        else if(Auth::check() && Auth::user()->usertype=='user'){
            return view('dashboard');
        }else{
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}