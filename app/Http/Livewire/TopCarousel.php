<?php

namespace App\Http\Livewire;

use App\Models\Banniere;
use Livewire\Component;

class TopCarousel extends Component
{
    public $bannieres;

    public function mount()
    {
        $this->bannieres = Banniere::query()
            ->where('is_actif', true)
            ->where('place', 'MAIN_PLACE')
            ->get();
    }

    public function render()
    {
        return view('livewire.top-carousel');
    }
}
