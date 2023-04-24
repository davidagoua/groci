<?php

namespace App\Filament\Widgets;

use App\Models\Boutique;
use Filament\Widgets\Widget;

class GerantResumeCard extends Widget
{
    protected static string $view = 'filament.widgets.gerant-resume-card';
    public $nombre_prouits, $nombre_stock, $nombre_indisponible;
    protected int | string | array $columnSpan = 12;
    public Boutique $boutique;

    public function mount()
    {
        $this->boutique = auth()->user()->boutique;
        $this->nombre_prouits = $this->boutique->propositions()->count();
        $this->nombre_stock = $this->boutique->propositions()->where('is_actif', true)->count();
        $this->nombre_indisponible = $this->boutique->propositions()->where('is_actif', false)->count();
    }

    public static function canView(): bool
    {
        return auth()->user()->hasRole('GERANT_BOUTIQUE') && auth()->user()->boutiques->count() > 0;

    }
}
