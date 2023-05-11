<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Livewire\Component;

class ProduitDetailsCard extends Component
{

    public $produit, $related_produits;

    public function mount()
    {
        $this->produit->load('image_produits');
        $this->related_produits = Produit::query()
            ->where('categorie_id', $this->produit->categorie_id)
            ->where('id', '<>', $this->produit->id)
            ->take(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.produit-details-card');
    }
}
