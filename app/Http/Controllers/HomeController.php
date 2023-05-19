<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
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
            ->take(9);
        $boutiques = Boutique::query()->take(5)->get();
        $categories = Categorie::query()->enfant()->get();

        return view('front.home.index', compact('produits','categories','boutiques'));
    }

    public function contact(Request $request)
    {
        return view('front.home.contact');
    }

    public function boutiques()
    {
        return view("");
    }
}
