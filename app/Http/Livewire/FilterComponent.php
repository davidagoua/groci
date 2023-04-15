<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class FilterComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    /**
     * @var \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public array|\Illuminate\Database\Eloquent\Collection $categories;
    public $filter_categorie = [];

    public function mount()
    {
        $this->categories = Categorie::query()->get();
    }

    public function render()
    {
        $produits = Produit::query()
            ->when(count(array_filter($this->filter_categorie)), function(Builder $query){
                $query->whereIn('categorie_id', $this->filter_categorie);
            })
            ->paginate(10);

        return view('livewire.filter-component', [
            'produits'=>$produits
        ]);
    }
}
