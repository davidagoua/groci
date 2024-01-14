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

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('boutique_id')
                    ->options(Boutique::query()->select('nom','id')->get()->pluck('nom','id')),
                Forms\Components\Hidden::make('token')->default(Str::random(60))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('boutique.nom'),
                Tables\Columns\TextColumn::make('token'),
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
