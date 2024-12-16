<?php

namespace App\Filament\Pages;

use App\Models\Categorie;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\CreateAction;
use Filament\Pages\Page;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class sous3categorie extends Page implements HasTable
{

    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.sous3categorie';
    protected static ?string $navigationLabel = "Sous Sous Categorie";
    protected static ?string $navigationGroup = "Produits";
    protected static ?string $title = "Sous Sous Categorie";
    protected static ?int $navigationSort = 4;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('super_admin');
    }

    public function getTableQuery(): Builder
    {
        return Categorie::query()->whereGeneration(3);
    }

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->label("Nom")->searchable(),
            TextColumn::make('categorie.name')->label("Parent"),
            ImageColumn::make('image'),
            TextInputColumn::make('order')->label("Numero d'ordre"),
            TextColumn::make('nb_produit')->counts('produits')->label("Nombre de produit"),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('parent_id')
                ->label("Categorie Parent")
                ->multiple()
                ->options(Categorie::enfant()->get()->pluck('name','id'))
        ];
    }

    public function getActions(): array
    {
        return [
            CreateAction::make('Créer')
                ->model(Categorie::class)
                ->mutateFormDataUsing(function (array $data): array {
                    $data['generation'] = 3;

                    return $data;
                })
                ->form([
                    Grid::make(['md'=>2])->schema([
                        TextInput::make('name')->label("Nom de la categorie"),
                        Select::make('parent_id')->label("Categorie Parent")
                            ->searchable()
                            ->options(Categorie::enfant()->get()->pluck('name','id')),
                        FileUpload::make('image')
                            ->columnSpan(2),
                    ])
                ]),

        ];
    }

    public function getTableActions(): array
    {
        return [
            \Filament\Tables\Actions\EditAction::make('modifier')
                ->button()
                ->color('secondary')
                ->form([
                    TextInput::make('name')->label("Nom de la categorie"),
                    Select::make('parent_id')->label("Categorie Parent")
                        ->options(Categorie::parent()->get()->pluck('name','id')),
                    FileUpload::make('image')->columnSpan(2),
                ]),
            DeleteAction::make('supprimer')
                ->button()
        ];
    }
}
