<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\MenuCategory;
use App\Observers\MenuCategoryObserver;
// use App\Observers\MenuCategoryObserver as ObserversMenuCategoryObserver;

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
        MenuCategory::observe(MenuCategoryObserver::class);
    }
}
