<?php

namespace App\Http\Controllers;

use App\Actions\AddCart;
use App\Models\Produit;
use App\Models\Proposition;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function search(Request $request)
    {

        return view("front.shop.search");
    }

    public function add_cart(Request $request, Proposition $proposition)
    {
        if($proposition->exists){
            AddCart::run($proposition);
        }

        return back();
    }

    public function produit_details(Request $request, Produit $produit)
    {
        return view("front.shop.details", [
            'produit'=>$produit
        ]);
    }

    public function set_localite(Request $request, string $ville)
    {
        session('ville', $ville);
        return back();
    }

    public function produit_matching()
    {
        return view('front.shop.produit_matching');
    }
}
