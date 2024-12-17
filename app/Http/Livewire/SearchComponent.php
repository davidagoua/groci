<?php

namespace App\Http\Livewire;

use App\Filters\ProductFilters;
use App\Models\Banniere;
use App\Models\Boutique;
use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\QueryBuilder\QueryBuilder;
use function PHPUnit\Framework\isEmpty;

class SearchComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public  $categories, $searchText, $bannieres;
    public $cats = [];
    public ?int $sscats = null;
    public $boutiques_filters = [];
    public $prixmin, $prixmax = null;

    public $nb_pages = 0;
    public $localite;
    protected $queryString = ['cats','page','prixmin','localite'];

    public ?int $selectedSousSousCaetgorie = null;


    public function mount(){
        $this->boutiques = Cache::remember('all_boutiques', 3600, fn() => Boutique::query()->get());
        $this->categories = Categorie::query()->parent()->get();
        $this->bannieres = Banniere::query()->get();
        $this->localite = session()->get('localite', "Tous") ;
        $this->selectedSousSousCategorie = (int) request()->query('sous_sous_categorie_id');

    }

    public function updateLocalite()
    {
        if($this->localite == "Tous"){
            session()->forget('localite');
        }else{
            session()->put('localite', $this->localite);
        }
        return redirect(request()->header('Referer'));
    }

    public function resetFilters()
    {
        $this->cats = [];
        $this->sscats = [];
        $this->boutiques_filters = [];
        $this->prixmin = null;
        $this->prixmax = null;
    }

    public function render()
    {
        $categorie = request()->filled('categorie') ? Categorie::query()->find(request()->get('categorie'))->first()->name  : "Tout";

        $selectedParent = (int) request()->query('parent');
        $selectedGrandParent = (int) request()->query('parent2');
        $this->selectedSousSousCategorie = (int) request()->query('sous_sous_categorie_id');

        $produits = QueryBuilder::for(Produit::class)
            ->allowedFilters(['nom','proposition.prix'])
            ->allowedIncludes(['propositions'])
            ->allowedSorts(['nom','prix','categorie_id','boutique_id','sous_sous_categorie_id'])
            /*
            ->whereHas('propositions', function(Builder $query){
                return $query
                ->when($this->prixmin, function(Builder $q){

                    return $q->where(column: 'prix', operator: '>=', value: $this->prixmin);
                })->when($this->prixmax, function(Builder $q){

                    return $q->where(column: 'prix', operator: '<=', value: $this->prixmax);
                })
                ->when(count(array_filter($this->boutiques_filters)), function(Builder $q){

                    return $q->whereIn('boutique_id', $this->boutiques_filters);
                });
            })
            */
            ->when(request()->filled('categorie'), function($builder) {
                return $builder->whereIn('categorie_id', [request()->get('categorie')]);
            })
            ->when(request()->filled('sous_sous_categorie_id'), function($builder) {
                return $builder->whereIn('sous_sous_categorie_id', [request()->get('sous_sous_categorie')]);
            })
            ->when(count(array_filter($this->cats)) , function($builder){
                return $builder->whereIn('categorie_id', $this->cats);
            });

            $pages = $produits->get()->chunk(21);
            $this->nb_pages = $pages->count();

        $villes = config('app.villes');
        return view('livewire.search-component', [
            'produits'=> $produits->paginate(21),
            "categorie_selected"=> $categorie,
            'villes'=>$villes,
            'selectedParent'=>$selectedParent,
            'selectedGrandParent'=>$selectedGrandParent,
            'selectedSousSousCategorie'=>$this->selectedSousSousCategorie
        ]);
    }

}
