<?php

namespace App\Filament\Widgets;

use App\Models\Boutique;
use App\Models\Proposition;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class GerantResumeTable extends BaseWidget
{
    public Boutique $boutique;
    protected int | string | array $columnSpan = 2;
    protected static ?string $heading = "30 derniers produits ajoutés";
    public function mount()
    {
        $this->boutique = auth()->user()->boutique;
    }
    protected function getTableQuery(): Builder
    {
        return Proposition::query()->where('boutique_id', $this->boutique->id);
    }

    public static function canView(): bool
    {
        return auth()->user()->hasRole('GERANT_BOUTIQUE');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\ImageColumn::make('Image')->getStateUsing(fn($record)=> $record->produit->image()->path),
            Tables\Columns\TextColumn::make('produit.nom')->searchable(),
            Tables\Columns\TextColumn::make('prix'),
            Tables\Columns\TextColumn::make('categorie.nom'),
            Tables\Columns\ToggleColumn::make('is_actif')->label("Disponible"),
        ];
    }
}
