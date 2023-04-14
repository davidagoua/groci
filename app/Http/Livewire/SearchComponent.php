<?php

namespace App\Http\Livewire;

use App\Models\Boutique;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class SearchComponent extends Component
{

    public  $categories;
    public $cats = [];
    public $boutiques_filters = [];
    public $price_range = null;
    public $prixmin = null;
    protected $queryString = ['cats'];


    public function mount(){
        $this->boutiques = Boutique::query()->get();
        $this->categories = Categorie::query()->enfant()->get();
    }



    public function render()
    {
        $price_range = $this->price_range;
        $categorie = request()->filled('categorie') ? Categorie::query()->find(request()->get('categorie'))->first()->name  : "Tout";
        $produits = Produit::query()
            ->whereHas('propositions', function(Builder $query){
                return $query
                ->when(count(array_filter($this->boutiques_filters)), function(Builder $q){
                    return $q->whereIn('boutique_id', $this->boutiques_filters);
                })
                ->when($this->prixmin, function(Builder $q){

                    return $q->where(column: 'prix', operator: '>=', value: $this->boutiques_filters);
                });
            })
            ->when(request()->filled('categorie'), function($builder) {
                return $builder->whereIn('categorie_id', [request()->get('categorie')]);
            })
            ->when(count(array_filter($this->cats)) , function($builder){
                return $builder->whereIn('categorie_id', $this->cats);
            });
        return view('livewire.search-component', [
            'produits'=> $produits->get(),
            "categorie_selected"=> $categorie
        ]);
    }
}
