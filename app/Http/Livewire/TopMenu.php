<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class TopMenu extends Component
{
    public $categories = [];

    public function mount()
    {
        $this->categories = Cache::remember('categorie', 30 * 60 * 60 ,function (){
            return Categorie::query()->get();
        });
    }
    public function render()
    {
        return view('livewire.top-menu');
    }
}
