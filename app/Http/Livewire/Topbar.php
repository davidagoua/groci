<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Topbar extends Component
{

    public $localite = "";
    protected $queryString = ['localite'];
    public $villes = [];

    public function mount()
    {
        $this->localite = session()->get('localite', "Tous") ;
        $this->villes = config('app.villes');
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

    public function render()
    {
        return view('livewire.topbar');
    }
}
