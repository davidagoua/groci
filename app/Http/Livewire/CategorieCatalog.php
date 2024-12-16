<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use Livewire\Component;

class CategorieCatalog extends Component
{
    public $categories = [];
    public $sous_categories = [];
    public $sous_sous_categories = [];
    public ?int $selected_categorie = null;
    public ?int $selected_sous_categorie = null;
    public ?int $selected_sous_sous_categorie = null;



    public function mount()
    {
        $this->categories = Categorie::parent()->get();
    }

    public function selectCategorie($categorie_id){
        $categorie = Categorie::query()->whereId($categorie_id)->first();
        $this->selected_categorie = $categorie_id;
        $this->sous_categories = $categorie->enfants()->get();
    }

    public function selectSousCategorie($sous_categorie_id)
    {
        $categorie = Categorie::query()->whereId($sous_categorie_id)->first();
        $this->selected_sous_categorie = $sous_categorie_id;
        $this->sous_sous_categories = $categorie->enfants()->get();
    }

    public function render()
    {
        return view('livewire.categorie-catalog');
    }
}
