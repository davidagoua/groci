<?php

namespace App\Filament\Pages;

use App\Actions\SeedPropositions;
use App\Models\Boutique;
use App\Models\Produit;
use App\Models\Proposition;
use App\Models\StatePrix;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\CreateAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SimpleExcel\SimpleExcelReader;

class OneProposition extends Page implements HasTable
{
    use InteractsWithTable;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.one-proposition';
    protected static ?string $title = "Propositions";
    protected static ?string $navigationGroup = "Boutique";
    protected $boutiques = [];

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->boutiques = Boutique::query()
            ->when(auth()->user()->hasRole('GerantBoutique'),function($query){
                $query->whereIn('id', auth()->user()->boutiques()->pluck('id')->toArray());
            })
            ->pluck('nom','id');

    }

    public function getTableQuery(): Builder
    {
        return Proposition::query()
            ->when(auth()->user()->hasRole('GerantBoutique'), function($builder){
                return $builder->whereIn('boutique_id', auth()->user()->boutiques()->pluck('id'));
            });
    }

    public function getActions(): array
    {
        return [
            Action::make("créer")
            ->form([
                Select::make('boutique_ids')
                    ->multiple()
                    ->label("Boutique")
                    ->options($this->boutiques)
                    ->columnSpan(2),
                Repeater::make('produits')
                ->columns(['md'=>2])
                ->schema([
                    Select::make('produit_id')
                        ->allowHtml()
                        ->label("Produit")
                        ->searchable()
                        ->getSearchResultsUsing(function (string $search) {
                            $produits = Produit::search($search)->get()->take(50);

                            return $produits->mapWithKeys(function ($produit) {
                                return [$produit->getKey() => static::getCleanProduitOptions($produit)];
                            })->toArray();
                        })
                        ->getOptionLabelUsing(function ($value): string {
                            $user = Produit::search($value);
                            return static::getCleanProduitOptions($user);
                        }),
                    TextInput::make('prix')->prefix('FCFA')
                ])->columnSpan(2)
            ])
            ->action(function(array $data){

                foreach ($data['boutique_ids'] as $boutique_id){
                    foreach ($data['produits'] as $item) {

                        Proposition::create([
                            'produit_id'=> $item['produit_id'],
                            'prix'=> $item['prix'],
                            'boutique_id'=> $boutique_id,
                        ]);
                    }
                }

            })
            ->successNotificationTitle("Propositions crées"),

            Action::make('importer')
                ->form([
                    Select::make('boutique_ids')
                        ->multiple()
                        ->label("Boutique")
                        ->options($this->boutiques),
                    FileUpload::make('fichier')
                ])
                ->action(function($data){
                    $reader = SimpleExcelReader::create(storage_path('app/public/'. $data['fichier']));
                    $reader->getRows()->each(function($row) use($data){
                        SeedPropositions::run($data['boutique_ids'], $row);
                    });
                })
        ];
    }

    public function getTableColumns(): array
    {
        return [
          TextColumn::make('produit.code_barre')->searchable(isIndividual: true)->label("Code barre"),
          TextColumn::make('produit.nom')->searchable(isIndividual: true),
          TextColumn::make('produit.categorie.name')->searchable(isIndividual: true),
          TextColumn::make('prix')->suffix(' FCFA')->sortable(),
          TextColumn::make('boutique.nom')->searchable(isIndividual: true),
          ToggleColumn::make('is_actif')->label("Disponible"),
        ];
    }

    public function getTableFilters(): array
    {
        return [
            SelectFilter::make('boutique_id')->label('Boutique')
                ->options($this->boutiques),
        ];
    }

    public function getTableBulkActions()
    {
        return [
            DeleteBulkAction::make()
        ];
    }

    public function getTableActions(): array
    {
        return [
          EditAction::make()
            ->form([
                Select::make('produit_id')
                    ->label("Produit")
                    ->options(Produit::query()->pluck('nom','id')),
                TextInput::make('prix')
                    ->suffix('FCFA')
            ])
        ];
    }

    public static function getCleanProduitOptions($model)
    {
        return
            view('filament.components.select-produit')
                ->with('name', $model?->nom)
                ->with('unite', $model?->unite)
                ->with('image', $model?->image()->path)
                ->render()
        ;
    }

}

