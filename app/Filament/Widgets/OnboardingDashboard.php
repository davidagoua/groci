<?php

namespace App\Filament\Widgets;

use App\Models\Proposition;
use App\Models\StatePrix;
use Filament\Widgets\Widget;
use Illuminate\Http\Request;

class OnboardingDashboard extends Widget
{
    protected static string $view = 'filament.widgets.onboarding-dashboard';
    protected int | string | array $columnSpan = 12;
    public $boutique_id = null;


    protected function getViewData(): array
    {
        $boutiques = auth()->user()->boutiques()->get();
        $states = null;
        $dates = null;
        $prices = null;

        $propositions =  Proposition::query()
            ->with('produit')
            ->with('priceState')
            ->when(auth()->user()->hasRole('GerantBoutique'), function($builder){
                return $builder->whereIn('boutique_id', auth()->user()->boutiques()->pluck('id'));
            });

        if($this->boutique_id != null){
            $propositions->where('boutique_id', '=',$this->boutique_id);
        }

        if(\request()->get('proposition')){
            $states = StatePrix::query()
                ->where('proposition_id','=', (int) request()->get('proposition'))->get();
            $dates = $states->pluck('created_at')->toArray();
            $prices = $states->pluck('value')->toArray();
        }

        return [
            'propositions'=>$propositions->get(),
            'boutiques'=> $boutiques,
            'states'=>$states,
            'dates' => $dates,
            'prices' => $prices
        ];
    }


}
