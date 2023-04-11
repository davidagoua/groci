<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\HtmlString;
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
            'https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css',
            'http://afriqconsulting.site/style.css'
        ]);

        Filament::serving(function () {
            // ...
            $primaryColor = '#FF8834'; // For example, put your tenant primary color here
            $secondaryColor = '#BBAA87'; // For example, put your tenant secondary color here

            Filament::pushMeta([
                new HtmlString('<meta name="theme-primary-color" id="theme-primary-color" content="' . $primaryColor . '">' .
                    '<meta name="theme-secondary-color" id="theme-secondary-color" content="' . $secondaryColor . '">'),
            ]);
        });

    }
}
