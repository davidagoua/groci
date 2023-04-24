<?php

namespace App\Filament\Widgets;

use App\Models\Boutique;
use Filament\Widgets\Widget;

class BoutiquePresentation extends Widget
{
    protected static string $view = 'filament.widgets.boutique-presentation';
    public  $boutiques;
    protected int | string | array $columnSpan = 12;


    public static function canView(): bool
    {
        return auth()->user()->hasRole('GERANT_BOUTIQUE') && auth()->user()->boutiques->count() > 0 ;
    }

    public function mount()
    {

        $this->boutiques = auth()->user()->boutiques ;
    }
}
