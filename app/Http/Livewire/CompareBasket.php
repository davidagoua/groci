<?php

namespace App\Http\Livewire;

use App\Models\Boutique;
use App\Models\Proposition;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class CompareBasket extends Component
{

    public $boutiques;
    public $boutique = null;
    public $panier_count = 0;
    public $panier;
    public $total = 0;
    public $viewable;

    public function mount()
    {
        $this->boutiques = Cache::remember('all_boutiques', 3600, fn() => Boutique::query()->get());
    }

    public function render()
    {
        if($this->boutique != null){
           $this->updateProduitDetails();
        }
        return view('livewire.compare-basket');
    }

    private function updateProduitDetails()
    {
        $this->panier = collect(session('panier') ?? []);
        $this->panier_count = $this->panier->count();
        $produit_quantity= [];

        $produits_id = Proposition::query()->whereIn('id', $this->panier->keys())
            ->get()
            ->each(function(Proposition $proposition) use(&$produit_quantity){
                $produit_quantity[$proposition->produit_id] = $this->panier[$proposition->id];
            })
            ->pluck('produit_id');


        $this->viewable = Proposition::query()->whereIn('produit_id', $produits_id)
            ->where('boutique_id', $this->boutique)
            ->get()
            ->map(function($proposition) use($produit_quantity) {
                $proposition['quantity'] = $produit_quantity[$proposition->produit_id];
                $proposition['total'] = $proposition->prix * $proposition['quantity'];
                return $proposition;
            });
        $this->total =$this->viewable->sum(fn($p)=> $p->total);
    }
}
