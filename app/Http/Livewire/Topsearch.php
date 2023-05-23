<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Topsearch extends Component
{

    public $terme = "";
    public $selectedProduit = null;

    public function render()
    {
        $produits = Produit::search($this->terme)
            ->get()
            ->take(10);
        return view('livewire.topsearch', [
            'produits'=> $produits
        ]);
    }
}
