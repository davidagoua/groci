<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategorieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'parent_id'=> $this->categorie?->id ?? null,
            'nom'=> $this->name,
            'slug'=> $this->slug,
            'image'=> asset("storage/".$this->image),
            'has_child'=> $this->enfants()->count() > 0
        ];
    }
}
