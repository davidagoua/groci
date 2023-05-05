<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $produits = Produit::query()
            ->with(['categorie','fournisseur'])
            ->get()
            ->take(9)
            ;

        $categories = Categorie::query()->enfant()->get();

        return view('front.home.index', compact('produits','categories'));
    }

    public function contact(Request $request)
    {
        return view('front.home.contact');
    }
}
