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
        // Validation is handled by LoginRequest
        $credential = $request->only('email', 'password');

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function registercheck(RegisterRequest $request){
        // Validation is handled by RegisterRequest
        // Laravel's Eloquent automatically hashes passwords when using the 'hashed' cast
        $user = User::create([
            'name' => $request->validated()['name'],
            'email' => $request->validated()['email'],
            'password' => $request->validated()['password'], // Will be automatically hashed by the model
        ]);
        
        Auth::login($user);

        return redirect()->route('dashboard');
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