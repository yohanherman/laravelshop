<?php

namespace App\Providers;

use App\Models\cart;
use App\Models\categories;
use Illuminate\Support\Facades\Auth;
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
        View()->composer('*', function ($view) {
            if (Auth::check()) {
                // $cart = cart::where('user_id', Auth::user()->user_id)->count();
                $totalQuantity = cart::where('user_id', Auth::id())->sum('quantity');
                $view->with('cartCount', $totalQuantity);
            }

            $categories = categories::all();
            $view->with('categories', $categories);
        });
    }
}
