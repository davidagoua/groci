<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [
    \App\Http\Controllers\HomeController::class,
    'index'
])->name('front.home');

Route::get("/contact",[
    \App\Http\Controllers\HomeController::class,
    'contact'
])->name('front.contact');

Route::controller(\App\Http\Controllers\ShopController::class)->group(function(){
    Route::any("/search", 'search')->name('front.shop.search');
    Route::any("/produit/{produit}", 'produit_details')->name('front.shop.produit_details');
    Route::get("/produit/{proposition}/add", 'add_cart')->name('front.shop.add_cart');
});

Route::controller(\App\Http\Controllers\AuthController::class)->group(function(){
   Route::post('/login', 'login')->name('auth.login');
   Route::post('/register', 'register')->name('auth.register');
   Route::post('/logout', 'logout')->name('auth.logout');
});
