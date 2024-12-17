<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProduitResource\Pages;
use App\Filament\Resources\ProduitResource\RelationManagers;
use App\Models\Categorie;
use App\Models\Produit;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProduitResource extends Resource
{
    protected static ?string $model = Produit::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';
    protected static ?string $navigationGroup = "Produits";
    protected static ?int $navigationSort = 30;

    public $selectCategorie = null;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\TextInput::make('code_barre')->label("Code Barre")->required(),
                    Forms\Components\TextInput::make('code_poss')->label("Code POS"),
                    Forms\Components\TextInput::make('nom')->label("Nom")->required(),
                    Forms\Components\Select::make('categorie_id')
                        ->label("Sous Categorie")
                        ->reactive()
                        ->options(Categorie::query()->whereNot('generation', 3)->where('parent_id','<>', null)->orderBy('name') ->get()->pluck('name','id')),

                    Forms\Components\Select::make('sous_sous_categorie_id')
                        ->label("Sous Sous Categorie")

                        ->options(fn(callable $get)=> Categorie::query()->where('generation', '=', 3)
                            ->where('parent_id', $get('categorie_id'))
                            ->orderBy('name') ->get()->pluck('name','id')
                        ),

                    Forms\Components\TextInput::make('unite')->placeholder('400kg')->required(),
                    Forms\Components\FileUpload::make('images')->default(function($state){
                        return $state?->image()->path;
                    })
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code_barre')->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('nom')->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('unite'),
                Tables\Columns\ImageColumn::make('image')
                    ->getStateUsing(fn($record)=> $record->image()->path)
                    ->label("Image"),
                Tables\Columns\TextColumn::make('categorie.name')->label('Sous Categorie'),
                Tables\Columns\TextColumn::make('sous_sous_categorie.name'),
                Tables\Columns\ToggleColumn::make('is_actif')
                    ->hidden(auth()->user()->hasRole('GerantBoutique'))
                    ->label("Actif"),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('categorie_id')
                    ->label("Categorie")
                    ->multiple()
                    ->options(Categorie::whereGeneration(3)->get()->pluck('name','id'))
            ])
            ->actions([
                Tables\Actions\EditAction::make()->using(function($record, $data){
                    $images = $data['images'];
                    if($images != null){
                        $record->image_produits()->create([
                            'path'=> $images
                        ]);
                    }

                    unset($data['images']);
                    $record->update($data);
                    return $record;
                }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProduits::route('/'),
        ];
    }
}
