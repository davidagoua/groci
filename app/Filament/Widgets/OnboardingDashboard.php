<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class OnboardingDashboard extends Widget
{
    protected static string $view = 'filament.widgets.onboarding-dashboard';
    protected int | string | array $columnSpan = 12;
}
