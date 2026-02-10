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
        return view('login');//redirect to login page
    }

    public function signup(){
        return view('registration');//redirect to registratation page
    }

    public function logincheck(LoginRequest $request){
        // Get only the email and password from the request
        $credential = $request->only('email', 'password');
        // Try to authenticate the user using the given credentials
        if (Auth::attempt($credential)) {
             // Regenerate session ID to prevent session fixation attacks
            $request->session()->regenerate();
            // Redirect the user to the dashboard if login is successful
            return redirect()->route('dashboard');
        } else {
            // If authentication fails, return back to the login page
            return back()
             // Attach an error message to the email field
            ->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])
             // Keep the email input so the user does not retype it
            ->withInput($request->only('email'));
        }  
    }

    public function registercheck(RegisterRequest $request){
        // Create a new user record in the database
        $user = User::create([
            'name' => $request->validated()['name'], // Get the validated name from the request
            'email' => $request->validated()['email'],  // Get the validated email from the request
            // Get the validated password from the request
            // hashed automatically in the User model
            'password' => $request->validated()['password'], 
        ]);

        return redirect()->route('login'); //redirect to login page
    }

    public function goDashboard(){
          // Check if the user is logged in and is an admin
        if(Auth::check() && Auth::user()->usertype=='admin'){
            return view('admin.dashboard'); //redirect to admin dashboard
        }
         // Check if the user is logged in and is a normal user
        else if(Auth::check() && Auth::user()->usertype=='user'){
            return view('dashboard');//redirect to user dashboard
        }else{
            // If not logged in, redirect the user to the login page
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout(); // Log out the currently authenticated user
        return redirect()->route('login'); // Redirect the user back to the login page
    }

}