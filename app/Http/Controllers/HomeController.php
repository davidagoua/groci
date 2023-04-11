<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {


        $produits = Produit::query()
            ->with(['categorie','fournisseur'])
            ->get()
            ->shuffle()->take(6);

        return view('front.home.index', compact('produits'));
    }

    public function contact(Request $request)
    {
        return view('front.home.contact');
    }
}
