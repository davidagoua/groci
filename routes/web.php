<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [
    \App\Http\Controllers\HomeController::class,
    'index'
])->name('front.home');

Route::view('/test', 'welcome');

Route::get("/contact",[
    \App\Http\Controllers\HomeController::class,
    'contact'
])->name('front.contact');

Route::controller(\App\Http\Controllers\ShopController::class)->group(function(){
    Route::any("/search", 'search')->name('front.shop.search');
    Route::any("/produit/{produit}", 'produit_details')->name('front.shop.produit_details');
    Route::get("/produit/{proposition}/add", 'add_cart')->name('front.shop.add_cart');
    Route::get("/localite/{ville}", 'set_localite')->name('front.shop.set_localite');
});

Route::controller(\App\Http\Controllers\AuthController::class)->group(function(){
   Route::post('/login', 'login')->name('auth.login');
   Route::post('/register', 'register')->name('auth.register');
   Route::post('/logout', 'logout')->name('auth.logout');
});


Route::any('register', \App\Http\Livewire\RegisterForm::class);
