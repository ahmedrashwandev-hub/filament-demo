<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class Stats extends BaseWidget
{
    /**
     * @return array<\Filament\Widgets\StatsOverviewWidget\Stat>
     */
    protected function getStats(): array
    {
        return [
            Stat::make('products', Product::count()),
            Stat::make('categories', Category::count()),
            Stat::make('users', User::count()),
            Stat::make('orders', Order::count()),
        ];
    }
}
