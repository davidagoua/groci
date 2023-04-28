<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProduitResource;
use App\Models\Boutique;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Proposition;
use F9Web\ApiResponseHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    use ApiResponseHelpers;

    public function getProduits(Request $request)
    {
        $produits = Produit::query()
            ->when($request->input('categorie'), function(Builder $query){
                return $query->where('categorie_id', request()->input('categorie'));
            })
            ->when($request->input('boutiques'), function(Builder $query){
                return $query->whereHas('propositions', function(Builder $query){
                    return $query->whereIn('boutique_id', request()->input('boutiques'));
                });
            });

        if($request->filled('search')){
            $produits = Produit::search($request->get('search'));
        }

        return $this->respondWithSuccess([
            'produits'=> ProduitResource::collection($produits->get())

        ]);
    }

    public function getPropositions(Request $request, Produit $produit)
    {
        $propositions = Proposition::query()
            ->where('produit_id', $produit->id);

        return $this->respondWithSuccess([
            'propositions'=> ProduitResource::collection($propositions->get())
        ]);
    }

    public function getBoutiques(Request $request)
    {
        $boutiques = Boutique::query();
        $boutiques->when($request->filled('search'), function(Builder $query){
            return $query->where('nom', 'like', "%".request()->input('search')."%");
        });

        return $this->respondWithSuccess([
            'boutiques'=> $boutiques->get()
        ]);
    }

    public function getCategories(Request $request)
    {
        $categories = Categorie::query();

        return $this->respondWithSuccess([
            'categories'=> $categories->get()
        ]);
    }
}
