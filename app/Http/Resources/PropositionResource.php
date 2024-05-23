<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PropositionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'produit_id'=> $this->produit_id,
            'created_at'=> $this->created_at,
            'updated_at'=> (new Carbon($this->updated_at)),
            'updated_at_humans'=> (new Carbon($this->updated_at))->diffForHumans(),
            'produit'=> $this->produit->nom,
            'image'=> asset('storage/'.$this->produit->image_produits()->first()?->path),
            'boutique_id'=> [
                "nom"=> $this->boutique->nom ,
                "image"=> asset('/storage/'.$this->boutique->image) ,
                "contact"=> $this->boutique->contact ,
                "contact2"=> $this->boutique->contact2 ,
                "ville"=> $this->boutique->ville,
                "quartier"=> $this->boutique->quartier ,
                "user_id"=> $this->boutique->user_id ,
                "lat"=> $this->boutique->lat ,
                "lng"=> $this->boutique->lng,
                "email"=> $this->boutique->email ,
                "address"=> $this->boutique->address ,
                "type"=> $this->boutique->type
            ],
            'prix'=> $this->prix,
            'disponible' => $this->is_actif,
        ];
    }
}
