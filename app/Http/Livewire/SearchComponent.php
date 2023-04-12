<?php

namespace App\Http\Livewire;

use App\Models\Boutique;
use App\Models\Categorie;
use App\Models\Produit;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class SearchComponent extends Component
{

    public  $categories;
    public $cats = [];
    public $price_range = [];
    protected $queryString = ['cats'];

    protected $rules = [
      'cats'=>'array|numeri'
    ];

    public function mount(){
        $this->boutiques = Boutique::query()->get();
        $this->categories = Categorie::query()->enfant()->get();
    }



    public function render()
    {
        $cats = $this->cats;
        $price_range = $this->price_range;
        $categorie = request()->filled('categorie') ? Categorie::query()->find(request()->get('categorie'))->first()->name  : "Tout";
        $produits = Produit::query()
            ->when(request()->filled('categorie'), function($builder) {
                return $builder->whereIn('categorie_id', [request()->get('categorie')]);
            })
            ->when(! isEmpty($price_range), function($builder) use ($price_range){
                return $builder->whereIn('prix', $price_range);
            });
        return view('livewire.search-component', [
            'produits'=> $produits->get(),
            "categorie_selected"=> $categorie
        ]);
    }
}
