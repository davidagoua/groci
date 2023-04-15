<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Topsearch extends Component
{

    public $terme = "";

    public function render()
    {
        $produits = Produit::query()
            ->when(strlen($this->terme) >= 2, function(Builder $query){
                return $query->whereRaw("LOWER(nom) like '%".strtolower($this->terme)."%'");
            })
            ->limit(10);
        return view('livewire.topsearch', [
            'produits'=> $produits->get()
        ]);
    }
}
