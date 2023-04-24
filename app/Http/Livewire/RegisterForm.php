<?php

namespace App\Http\Livewire;

use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Livewire\Component;

class RegisterForm extends Component implements HasForms
{

    use InteractsWithForms;

    public function getFormSchema(): array
    {
        return [
            Toggle::make('is_boutique')
                ->label("Je suis  un gérant de boutique"),
            Fieldset::make("Formulaire client")
                ->schema([
                    TextInput::make('email')
                ])
        ];
    }
    public function render()
    {
        return view('livewire.register-form');
    }
}
