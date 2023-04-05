<?php

namespace App\Http\Livewire;

use App\Models\Boutique;
use App\Models\Categorie;
use App\Models\Produit;
use Livewire\Component;

class SearchComponent extends Component
{

    public $produits;

    public function mount(){
        $this->produits = Produit::query()->get();
        $this->categories = Categorie::query()->get();
        $this->boutiques = Boutique::query()->get();
    }

    public function render()
    {
        return view('livewire.search-component');
    }
}
