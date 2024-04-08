<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommandeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $quantite = $request->input('commandes')[$this->id];

        return [
            'quantite'=> $request->input('commandes'),
            'propositions'>null,
        ];
    }
}
