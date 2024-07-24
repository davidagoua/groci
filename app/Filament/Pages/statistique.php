<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\GerantResumeCard;
use App\Filament\Widgets\OnboardingDashboard;
use Filament\Pages\Page;

class statistique extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.statistique';
    protected static ?string $navigationLabel = "Statistiques";


    protected function getHeaderWidgets(): array
    {
        return [
            GerantResumeCard::class,
            OnboardingDashboard::class,
        ];
    }
}
