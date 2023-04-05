<?php

namespace App\Http\Livewire;

use App\Actions\AddCart;
use App\Models\Produit;
use Livewire\Component;

class ProduitCard extends Component
{
    public Produit $produit;

    public function render()
    {
        return view('livewire.produit-card');
    }

    public function add_cart($quantity=0)
    {
        AddCart::run($this->produit, $quantity);
    }
}
