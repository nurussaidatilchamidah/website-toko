<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BasePage;
use App\Filament\Widgets\StokOverview;

class Dashboard extends BasePage
{
    public function getWidgets(): array
    {
        return [
            StokOverview::class,
        ];
    }
}
