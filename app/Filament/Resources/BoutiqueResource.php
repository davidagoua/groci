<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoutiqueResource\Pages;
use App\Filament\Resources\BoutiqueResource\RelationManagers;
use App\Models\Boutique;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Pages\Actions\Action;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Humaidem\FilamentMapPicker\Fields\OSMMap;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Intervention\Image\Point;


class BoutiqueResource extends Resource
{
    protected static ?string $model = Boutique::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = "Paramètres";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nom')->required(),
                Forms\Components\FileUpload::make('image')
                    ->label("Logo")
                    ->image(),

                Forms\Components\TextInput::make('contact')
                    ->prefix('+225')
                    ->label("Contact 1")->required(),
                Forms\Components\TextInput::make('contact2')
                    ->prefix('+225')
                    ->label("Contact 2"),

                Forms\Components\TextInput::make('address')
                    ->required()
                    ->label("Adresse"),

                Select::make('type')->options([
                    'boutique'=>'Boutique',
                    'grossiste' => 'Grossiste',
                    'hyper-marche'=>'Hyper Marché',
                    'super-marche'=>'Super Marché',
                    'superette'=>'Superette',
                ]),

                Forms\Components\Select::make('ville')
                    ->reactive()
                    ->required()
                    ->options( collect(config("app.villes"))->sort() ),
                Select::make('quartier')
                    ->label("Commune")
                    ->options([
                        "abobo" => "Abobo",
                        "adjamé" => "Adjamé",
                        "anyama" => "Anyama",
                        "attécoubé" => "Attécoubé",
                        "bingerville" => "Bingerville",
                        "cocody" => "Cocody",
                        "koumassi" => "Koumassi",
                        "marcory" => "Marcory",
                        "plateau" => "Plateau",
                        "port-bouët" => "Port-bouët",
                        "treichville" => "Treichville",
                        "songon" => "Songon",
                        "yopougon" => "Yopougon"
                    ])
                    ->searchable()
                    ->visible(fn($get, $set) => $get('ville') == "ABIDJAN"),

                Forms\Components\TextInput::make('email')->required(),



                OSMMap::make('coord')
                    ->label("Coordonnée")
                    ->showMarker()
                    ->draggable()
                    ->columnSpan(2)
                    ->afterStateUpdated(function ($state, callable $set)  {
                        $set('longitude', $state['lng']);
                        $set('latitude', $state['lat']);
                    })
                    ->extraControl([
                        'zoomDelta'           => 1,
                        'zoomSnap'            => 0.25,
                        'wheelPxPerZoomLevel' => 60
                    ])->reactive()
                ]);
    }

    public function getActions()
    {
        return [
            Action::make('importer')
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom'),
                Tables\Columns\TextColumn::make('contact'),
                Tables\Columns\TextColumn::make('ville'),

                Tables\Columns\TextColumn::make('propositions_count')
                    ->label("Propositions")
                    ->counts('propositions')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->mutateFormDataUsing(function($data){
                    $coord = $data['coord'];
                    unset($data['coord']);
                    $data['lat'] = $coord['lat'];
                    $data['lng'] = $coord['lng'];
                    return $data;
                }),
                Tables\Actions\DeleteAction::make()->visible(auth()->user()->hasRole('super_admin')),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBoutiques::route('/'),
        ];
    }
}
