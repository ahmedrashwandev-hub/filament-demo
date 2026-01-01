<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use BackedEnum;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class StatsPage extends Page
{
    protected static ?string $navigationLabel = 'Stats'; // name page
    protected static ?int $navigationSort = 2; // order in navigation
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-pie';

    public $totalOrders;
    public $totalCategories;
    public $totalProducts;
    public $totalUsers;


    public function mount(): void
    {
        $this->totalOrders = Order::count();
        $this->totalCategories = Category::count();
        $this->totalProducts = Product::count();
        $this->totalUsers = User::count();
    }

    protected string $view = 'filament.pages.stats-page';
}
