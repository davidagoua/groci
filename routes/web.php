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
    Route::any("/recherche", 'search')->name('front.shop.recherche');
    Route::any("/produit/{produit}", 'produit_details')->name('front.shop.produit_details');
    Route::get("/produit/{proposition}/add", 'add_cart')->name('front.shop.add_cart');
    Route::get("/localite/{ville}", 'set_localite')->name('front.shop.set_localite');
    Route::get('/comparaison', 'produit_matching')->name('front.shop.comparaison');
});

Route::controller(\App\Http\Controllers\AuthController::class)->group(function(){
   Route::post('/login', 'login')->name('auth.login');
   Route::post('/register', 'register')->name('auth.register');
   Route::get('/logout', 'logout')->name('auth.logout');
});

Route::controller(\App\Http\Controllers\TwoFAController::class)->group(function(){
   Route::get('/two', 'index')->name('twofactor.index');
   Route::post('/two', 'store')->name('twofactor.store');
   Route::get('/two/resend', 'resend')->name('twofactor.resend');
});

Route::get('/testmail', function(){
    $user = \App\Models\User::firstOrCreate(
        ['email'=>'cdavidagoua@mail.com'],
        [
            'name'=>'cdavidagoua',
            'password'=> \Illuminate\Support\Facades\Hash::make('password')
        ]
    );
   return \Illuminate\Support\Facades\Mail::to($user)->send(new \App\Mail\BoutiqueWelcome($user))->toString();
    //return (new \App\Mail\BoutiqueWelcome($user))->render();
});
