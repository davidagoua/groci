<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Livewire\Component;

class ProduitView extends Component
{
    public Produit $produit;

    public function render()
    {
        return view('livewire.produit-view');
    }
}
