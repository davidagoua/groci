<?php

namespace App\Filament\Pages;

use App\Models\Ligne;
use App\Models\Panier;
use Filament\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;

class Vente extends Page implements HasTable
{

    use InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = "Boutique";
    protected static string $view = 'filament.pages.vente';
    protected static bool $shouldRegisterNavigation = false;

    public function getTableQuery(): Builder
    {
        return Ligne::query();
    }
}
