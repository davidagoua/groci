<?php

namespace App\View\Components;

use App\Models\Produit;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    /**
     * Create a new component instance.
     */

    public $produit;

    public function __construct(Produit $produit)
    {
        $this->produit = $produit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
