<?php

namespace App\Filament\Pages;

use App\Models\Categorie;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\CreateAction;
use Filament\Pages\Actions\EditAction;
use Filament\Pages\Page;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;

class SousCategorie extends Page implements HasTable
{
    use InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = "Sous Categories";
    protected static string $view = 'filament.pages.sous-categorie';
    protected static ?string $navigationGroup = "Produits";
    protected static ?int $navigationSort = 2;


    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('super_admin');
    }
    public function getTableQuery(): Builder
    {
        return Categorie::enfant();
    }

    public function getTableColumns(): array
    {
        return [
          TextColumn::make('name')->label("Nom"),
          TextColumn::make('categorie.name')->label("Parent"),
          ImageColumn::make('image'),
        ];
    }

    public function getActions(): array
    {
        return [
          CreateAction::make('Créer')
            ->model(Categorie::class)
            ->form([
                Grid::make(['md'=>2])->schema([
                    TextInput::make('name')->label("Nom de la categorie"),
                    Select::make('parent_id')->label("Categorie Parent")
                        ->options(Categorie::parent()->get()->pluck('name','id')),
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
            ->form([
                TextInput::make('name')->label("Nom de la categorie"),
                Select::make('parent_id')->label("Categorie Parent")
                    ->options(Categorie::parent()->get()->pluck('name','id')),
                FileUpload::make('image')->columnSpan(2),
            ])
        ];
    }
}
