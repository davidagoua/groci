<?php

namespace App\Http\Controllers\Api;

use App\Actions\SeedingProduct;
use App\Actions\SeedPropositions;
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
            ->when($request->input('sous_sous_categorie_id'), function(Builder $query){
                return $query->where('sous_sous_categorie_id', (int) request()->input('sous_sous_categorie_id'));
            })
            ->when($request->input('categorie') && !$request->filled('sous_sous_categorie_id') , function(Builder $query){
                return $query->where('categorie_id', (int) request()->input('categorie'));
            })
            ->when($request->input('barcode'), function(Builder $query){
                return $query->where('code_barre', request()->input('barcode'));
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
            ->where('produit_id', $produit->id)
            ->orderBy('prix');

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

    public function getCategories(Request $request, Categorie $categorie)
    {
        $categories = Categorie::parent();
        return $this->respondWithSuccess([
            'categories'=> CategorieResource::collection($categories->get())
        ]);
    }

    public function getParentCategories(Request $request)
    {
        $categories = Categorie::parent();
        return $this->respondWithSuccess([
            'categories'=> CategorieResource::collection($categories->get())
        ]);
    }

    public function getParentCategoriesByParent(Request $request, Categorie $categorie)
    {
        $categories = $categorie->enfants();
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
            "products.*.code_pos"=>'required',
            "products.*.code_barre"=>'required',
            "products.*.prix"=>'required',
        ]);

        if($validator->fails()){
            return $this->respondFailedValidation($validator->errors()->toJson());
        }

        SeedPropositions::run([$boutique->id,], $validator->validated()['products']);
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
        $resume = array();

        $validator = Validator::make($request->input(), [
            'commandes'=>'array|required'
        ]);

        if($validator->fails()){
            return $this->respondFailedValidation($validator->errors()->toJson());
        }
        $data = $validator->validated();

        $propositions = Proposition::query()
            ->whereIn('id', collect($data['commandes'])->keys())
            ->with('boutique:id,nom,image')
            ->get()
            ->map(function($proposition) use ($data){
                try{
                    $proposition['image'] = Produit::query()
                    ->firstWhere('id', '=', $proposition['produit_id'])
                    ->image()?->path;

                    //$proposition['image'] = Produit::query()->firstWhere('id', '=', $data['commandes'][$proposition['produit_id']])?->image()->path;
                }catch (\Exception $e){
                    $proposition['image'] = "";
                }

                $proposition['somme'] = $data['commandes'][$proposition['id']] * $proposition->prix;
                $proposition['quantite'] = $data['commandes'][$proposition['id']] ;
                return $proposition;
            })
            ->groupBy('boutique_id')
            ;
        foreach ($propositions as $key=> $value){

            $resume[] = [
                'boutique_id'=>$key,
                'required_nombre'=> count($data['commandes']),
                'nom'=>$value[0]['boutique']['nom'],
                'image'=> asset('storage/', $value[0]['boutique']['image']),
                'image_in'=> $value[0]['boutique']['image'],
                'nombre_produit'=> count($value),
                'prix_total'=> collect($value)->sum(fn($v) => $v->somme ),
                'propositions'=> $value
            ];
        }
        return $this->respondWithSuccess([
            'boutiques'=>$resume
        ]);
    }

    public function get_categorie_children(Request $request, Categorie $categorie)
    {
        $enfants = $categorie->enfants()->get();
        return $this->respondWithSuccess([
            'data'=>CategorieResource::collection($enfants)
        ]);
    }

    public function getAllCategorie()
    {
        $categories = Categorie::query()->get();
        return $this->respondWithSuccess([
            'count'=> $categories->count(),
            'categories'=> CategorieResource::collection($categories)
        ]);
    }

    public function getAllProductFromCategorie(Request $request, Categorie $categorie)
    {
        $produits = $categorie->produitsAvecEnfants();
        return $this->respondWithSuccess([
            'count'=>$produits->count(),
            'produits'=> ProduitResource::collection($produits->get())
        ]);
    }



}
