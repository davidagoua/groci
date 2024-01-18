<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoutikTokenResource\Pages;
use App\Filament\Resources\BoutikTokenResource\RelationManagers;
use App\Models\BoutikToken;
use App\Models\Boutique;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Js;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BoutikTokenResource extends Resource
{
    protected static ?string $model = BoutikToken::class;
    protected static ?string $navigationGroup = "Paramètres";
    protected static ?string $label = "API key";
    protected static ?string $navigationIcon = 'heroicon-o-collection';


    public static function form(Form $form): Form
    {
        $boutiques = auth()->user()->hasRole('Super Admin') ?
            Boutique::query()->select('nom','id')->get()->pluck('nom','id') :
            auth()->user()->boutiques()->select('nom','id')->get()->pluck('nom','id');

        return $form
            ->schema([
                Forms\Components\Select::make('boutique_id')
                    ->label('Boutique')
                    ->options($boutiques),
                Forms\Components\Hidden::make('token')->default(Str::random(60))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('boutique.nom'),
                Tables\Columns\TextColumn::make('token')
                    ->copyable()
                    ->copyMessage("Clé d'API Copiée"),
                Tables\Columns\TextColumn::make('created_at')->label("Date de creation"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBoutikTokens::route('/'),
        ];
    }


}
