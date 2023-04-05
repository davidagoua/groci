<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use Livewire\Component;

class CategorieCarousel extends Component
{

    public $items;

    public function mount()
    {
        $this->items = Categorie::query()->get();
    }

    public function render()
    {
        return view('livewire.categorie-carousel');
    }
}
