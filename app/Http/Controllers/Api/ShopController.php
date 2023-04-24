<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function getProduits(Request $request)
    {
        $produits = Produit::query()->get();

        return response()->json([
            'produits'=> $produits
        ]);
    }

    public function getProposition(Request $request, Produit $produit)
    {
        return response()->json([
            'produits'=> $produit->propositions()
        ]);
    }
}
