<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class sponsors extends Widget
{
    protected static string $view = 'filament.widgets.sponsors';
    protected int | string | array $columnSpan = 12;
    protected static ?int $sort = 30;



}
