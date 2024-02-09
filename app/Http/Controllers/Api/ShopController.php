<?php

namespace App\Http\Controllers\Api;

use App\Actions\SeedingProduct;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategorieResource;
use App\Http\Resources\ProduitResource;
use App\Http\Resources\PropositionResource;
use App\Models\BoutikToken;
use App\Models\Boutique;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Proposition;
use F9Web\ApiResponseHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
            'propositions'=> PropositionResource::collection($propositions->get())
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
        $categories = Categorie::enfant();
        return $this->respondWithSuccess([
            'categories'=> CategorieResource::collection($categories->get())
        ]);
    }

    public function getOneProduit(Request $request, Produit $produit)
    {
        return $this->respondWithSuccess(new ProduitResource($produit));
    }

    public function createProducts(Request $request)
    {
        // verificationn API token
        $token = $request->headers->get('Authorization');
        if(!$token){
            return abort(403, message: "API Token should be present");
        }

        $boutique = BoutikToken::query()
            ->firstWhere('token', '=', Str::of($token)->split("/\s+/")[1])
            ?->first();
        if(! $boutique){
            return abort(403, message: "Invalid API Token");
        }

        $validator = Validator::make($request->input(), [
            'products'=>'required',
            "products.*.code_pos"=>'required',
            "products.*.code_barre"=>'required',
            "products.*.prix"=>'required',
        ]);

        if($validator->fails()){
            return $this->respondFailedValidation($validator->errors()->toJson());
        }

        SeedingProduct::run([
            "boutique_id"=>$boutique->id,
            "products"=>$validator->validated()['products']
        ]);
        return $this->respondCreated();
    }

    public function getVilles()
    {
        return $this->respondWithSuccess([
            'villes'=>collect(config('app.villes'))->keys()
        ]);
    }

    public function getResume(Request $request)
    {
        $data = $request->validate([
           'commandes'=>'array'
        ]);
        $propositions = Proposition::query()
            ->whereIn('produit_id', collect($data['commandes'])->keys())
            ->with('boutique:id,nom,image')
            ->get()
            ->groupBy('boutique_id');
        return $this->respondWithSuccess([
            'boutiques'=>$propositions
        ]);
    }
}
