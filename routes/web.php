<?php

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\SimpleExcel\SimpleExcelWriter;


Route::get('/', [
    \App\Http\Controllers\HomeController::class,
    'index'
])->name('front.home');


Route::view('/test', 'welcome');

Route::get("/contact",[
    \App\Http\Controllers\HomeController::class,
    'contact'
])->name('front.contact');

Route::get('/boutiques', [\App\Http\Controllers\HomeController::class, 'boutiques'])->name('front.boutiques');

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
        ['email'=>'cdavidagoua@gmail.com'],
        [
            'name'=>'cdavidagoua',
            'password'=> \Illuminate\Support\Facades\Hash::make('password')
        ]
    );
   return \Illuminate\Support\Facades\Mail::to($user)->send(new \App\Mail\BoutiqueWelcome($user))->toString();
    //return (new \App\Mail\BoutiqueWelcome($user))->render();
});

Route::get('/clear-cart', function(Request $request){
    session()->remove('panier');
    session()->flash('info', "Panier vidé");
    return redirect()->back();
})->name('shop.clear-cart');

Route::get('/download-produit',function(Request $request){
    $writer = SimpleExcelWriter::streamDownload("Produits.xlsx");
    $writer->addHeader(['n°','code_barre','nom','unite','prix']);
    $rows = Produit::query()->select(['id','code_barre','nom','unite'])->get();
    $writer->addRows($rows->toArray());
    $writer->toBrowser();
})  ->name('dowload_produit')
    ->middleware(['auth']);

Route::post('/newsletter', function (Request $request){
    $data = $request->validate([
        'email'=>'required|email'
    ]);
    \App\Models\Prospect::create($data);
    return back();
})->name('newsletter');


Route::get('/download-apk', function(Request $request){
    response()->download(storage_path('app/app-release.apk'), 'cmoinscher');
})->name('download-apk');
