<?php

namespace App\View\Components;

use App\Models\Categorie;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CatalogCategorie extends Component
{

    protected $categorie;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $categorieId
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $categorie = Categorie::query()->whereId($this->categorieId)->first();
        return view('components.catalog-categorie',[
            'categorie'=>$categorie
        ]);
    }
}
