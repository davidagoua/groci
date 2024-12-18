<?php

namespace App\Filament\Widgets;

use App\Models\Boutique;
use App\Models\Produit;
use App\Models\Proposition;
use App\Models\User;
use Filament\Widgets\Widget;

class AdminResumeCard extends Widget
{
    protected static string $view = 'filament.widgets.admin-resume-card';
    protected int | string | array $columnSpan = 12;

    public $nb_produits, $nb_boutiques, $nb_clients;

    public function mount(){
        $this->nb_clients = User::query()->count();
        $this->nb_boutiques = Boutique::query()->count();
        $this->nb_produits = Produit::query()->count();
    }

    public static function canView(): bool
    {
        return ! auth()->user()->hasRole('GERANT_BOUTIQUE');
    }
}
