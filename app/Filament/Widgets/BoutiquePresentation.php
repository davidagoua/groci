<?php

namespace App\Filament\Widgets;

use App\Models\Boutique;
use Filament\Widgets\Widget;

class BoutiquePresentation extends Widget
{
    protected static string $view = 'filament.widgets.boutique-presentation';
    public Boutique $boutique;
    protected int | string | array $columnSpan = 12;


    public static function canView(): bool
    {
        return auth()->user()->hasRole('GERANT_BOUTIQUE');
    }

    public function mount()
    {
        $this->boutique = auth()->user()->boutique;
    }
}
