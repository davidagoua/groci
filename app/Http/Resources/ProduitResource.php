<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Produit;

class ProduitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
			"created_at"=> $this->created_at  ,
			"updated_at"=> $this->updated_at  ,
			"categorie_id"=> $this->categorie_id ,
			"categorie"=> $this->categorie->name ?? '' ,
			"sous_sous_categorie_id"=> $this->sous_sous_categorie_id ?? '' ,
			"sous_sous_categorie"=> $this->sous_sous_categorie->name ?? '' ,
			"marque_id"=> $this->marque_id  ,
			"fournisseur_id"=> $this->fournisseur_id  ,
			"prix"=> $this->prix  ,
			"min_price"=> $this->minPrice  ,
			"fake_price"=> $this->fake_price  ,
			"nom"=> $this->nom  ,
			"stock"=> $this->stock  ,
			"description"=> $this->description ,
			"unite"=> $this->unite ,
			"is_actif"=> $this->is_actif,
            "image"=> asset('storage/'.$this->image_produits()->first()?->path)
        ];
    }
}
