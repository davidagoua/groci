<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(\App\Http\Controllers\Api\ShopController::class)
    ->prefix("/shop")
    ->group(function(){
        Route::get("/propositions", 'getPropositions');
        Route::get("/produits", 'getProduits');
        Route::post("/produits", 'createProducts');
        Route::get('/produits/{produit}', 'getOneProduit');
        Route::get('/produits/{produit}/propositions', 'getPropositions');
        Route::get('/boutiques', 'getBoutiques');
        Route::get('/categories', 'getCategories');
        Route::get('/categories-parents', 'getParentCategories');
        Route::get('/categories/{categorie}/enfants', 'getParentCategoriesByParent');
        Route::get('/villes', 'getVilles');
        Route::post('/resume', 'getResume');
        Route::get('/categorie/{categorie}/children/', 'get_categorie_children')
            ->name('categorie-children');
        Route::get('/all-categories', 'getAllCategorie');
        Route::get('/categorie-parent/{categorie}/produits', 'getAllProductFromCategorie');

    });

Route::get('/categorie/{categorie}/children/', [\App\Http\Controllers\Api\ShopController::class, 'get_categorie_children'])
    ->name('categorie-children');

