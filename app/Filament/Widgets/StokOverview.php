<?php

namespace App\Filament\Widgets;

use App\Models\Stok;
use App\Models\Penjualan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StokOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Produk', Stok::count())
                ->description('Jumlah semua produk')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),

            Card::make('Stok Menipis', Stok::where('stok', '<=', 5)->count())
                ->description('Barang yang hampir habis')
                ->descriptionIcon('heroicon-m-exclamation-circle')
                ->color('danger'),

            Card::make('Total Penjualan', Penjualan::sum('jumlah'))
                ->description('Barang terjual')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success'),
        ];
    }
}
