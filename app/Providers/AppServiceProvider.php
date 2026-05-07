<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        // Fix Gate
        Gate::define('is-admin', function (User $user) {
            return $user->role === 'admin';
        });

        // Fix View Composer
        view()->composer('shop.layouts._navbar', function ($view) {
            $count = 0;
            // Gunakan facades Auth untuk lebih stabil
            if (\Illuminate\Support\Facades\Auth::check()) {
                $userId = \Illuminate\Support\Facades\Auth::id();
                $count = \App\Models\Cart::where('user_id', $userId)->sum('quantity');
            }
            $view->with('totalQty', $count);
        });
    }
}
