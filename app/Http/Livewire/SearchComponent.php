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
        $produits = Produit::query()
            ->when(! isEmpty($cats), function($builder) use ($cats){
                return $builder->whereIn('categorie_id', $cats);
            })
            ->when(! isEmpty($price_range), function($builder) use ($price_range){
                return $builder->whereIn('prix', $price_range);
            });
        return view('livewire.search-component', [
            'produits'=> $produits->get()
        ]);
    }
}
