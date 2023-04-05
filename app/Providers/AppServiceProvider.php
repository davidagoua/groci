<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::registerNavigationGroups([
            'Boutique','Apparence','Produits','Paramètres'
        ]);

        Filament::registerScripts([
            'https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js'
        ]);

        Filament::registerStyles([
            'https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css'
        ]);
    }
}
