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


const ITEMS_PER_PAGE = 21;
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

    public ?int $selectedSousSousCategorie = null;


    public function mount(){
        $this->boutiques = Cache::remember('all_boutiques', 3600, fn() => Boutique::query()->get());
        $this->categories = Categorie::query()->parent()->get();
        $this->bannieres = Banniere::query()->get();
        $this->localite = session()->get('localite', "Tous") ;
        //$this->sscats = false;

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
        $this->sscats = null;
        $this->boutiques_filters = [];
        $this->prixmin = null;
        $this->prixmax = null;
    }



    public function render()
    {
        // Définir constantes et variables communes

        $query = request(); // Extraction pour un accès simplifié aux paramètres
        $categorieId = (int)$query->get('categorie');
        $sousSousCategorieId = (int)$query->query('sous_sous_categorie_id');
        $parentId = (int)$query->query('parent');
        $grandParentId = (int)$query->query('parent2');
        $this->selectedSousSousCategorie = $sousSousCategorieId;
        $enabledCategoryFilters = count(array_filter($this->cats));

        // Récupérer nom de la catégorie ou valeur par défaut
        $categorie = $query->filled('categorie')
            ? optional(Categorie::find($categorieId))->name
            : "Tout";

        // Construction de la requête des produits
        $produits = QueryBuilder::for(Produit::class)
            ->with('categorie')
            ->allowedFilters(['nom', 'proposition.prix'])
            ->allowedFields('categorie.id', 'categorie.parent_id')
            ->allowedIncludes(['propositions','categorie'])
            ->allowedSorts(['nom', 'prix', 'categorie_id', 'boutique_id', 'sous_sous_categorie_id', 'parent', 'cat'])
            //->when($query->filled('sous_sous_categorie_id'), fn($builder) => $builder->where('sous_sous_categorie_id', $sousSousCategorieId)
            //)
            ->when($query->filled('cat'), fn($builder) => $builder->where('categorie_id', (int) $query->get('cat') ))
            ->when($query->filled('sous_sous_categorie_id') && !$query->filled('cat'), fn($builder) => $builder->where('sous_sous_categorie_id', $sousSousCategorieId))
            ->when(!$query->filled('sous_sous_categorie_id') && !$query->filled('cat') && $query->filled('parent2'), fn($builder) => $builder->where('categorie_id', $grandParentId));
            //->when($enabledCategoryFilters, fn($builder) => $builder->whereIn('categorie_id', $this->cats));



        // Charger et paginer les résultats
        $produitsPagination = $produits->paginate(ITEMS_PER_PAGE);
        $this->nb_pages = $produitsPagination->lastPage();

        // Construction des variables pour la vue
        $villes = config('app.villes');
        return view('livewire.search-component', [
            'produits' => $produitsPagination,
            'categorie_selected' => $categorie,
            'villes' => $villes,
            'selectedCategorie' => $query->query('cat'),
            'selectedParent' => $parentId,
            'selectedGrandParent' => $grandParentId,
            'selectedSousSousCategorie' => $this->selectedSousSousCategorie,
        ]);
    }

}
