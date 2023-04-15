<?php

namespace App\Http\Livewire;

use App\Models\Boutique;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use function PHPUnit\Framework\isEmpty;

class SearchComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public  $categories;
    public $cats = [];
    public $boutiques_filters = [];
    public $price_range = null;
    public $prixmin, $prixmax = null;

    public $nb_pages = 0;
    protected $queryString = ['cats','page','prixmin'];


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

            $pages = $produits->get()->chunk(21);
            $this->nb_pages = $pages->count();
        return view('livewire.search-component', [
            'produits'=> $produits->paginate(21),
            "categorie_selected"=> $categorie
        ]);
    }

}
