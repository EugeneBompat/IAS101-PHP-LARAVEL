<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

//If URL have "/login" redirect to login page
Route::get('/login',[UserController::class,'login'])->name('login');
//If URL have "/signup" redirect to signup page
Route::get('/signup',[UserController::class,'signup'])->name('register');

//Used to route from login page to call the logincheck() function for verification.
Route::post('login',[UserController::class,'logincheck'])->name('logincheck');
//Used to route from signup page to call the registercheck() function for verification.
Route::post('signup',[UserController::class,'registercheck'])->name('registercheck');

//If URL have "dashboard", it will call the function goDashboard() and redirect to designated dashboard
Route::get('dashboard',[UserController::class,'goDashboard'])->name('dashboard');
//I URL have "logout", it will call the function logout() and redirect to welcome
Route::get('logout',[UserController::class,'logout'])->name('logout');