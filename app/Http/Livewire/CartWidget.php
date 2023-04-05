<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use App\Models\Proposition;
use Livewire\Component;

class CartWidget extends Component
{
    public $panier_count = 0;
    public $panier;
    public $total = 0;
    public $viewable;

    public function mount()
    {
        $this->panier = collect(session('panier') ?? []);
        $this->panier_count = $this->panier->count();


        $this->viewable = Proposition::query()->whereIn('id', $this->panier->keys())
            ->get()
            ->map(function($proposition) {
               $proposition['quantity'] = $this->panier[$proposition->id];
               $proposition['total'] = $proposition->prix * $proposition['quantity'];
               return $proposition;
            });
        $this->total =$this->viewable->sum(fn($p)=> $p->total);
    }

    public function clear_cart()
    {
        session()->remove('panier');
        session()->flash('info', "Panier vidé");
        $this->emit('panier_vider');
    }

    public function render()
    {
        return view('livewire.cart-widget');
    }
}
