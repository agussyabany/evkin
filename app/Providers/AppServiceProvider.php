<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Ipa\Kimia\Permintaan;

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
         View::composer('layouts.header', function ($view) {

        $jumlahNotifikasi = 0;

        if (Auth::check() && Auth::user()->hasAnyRole(['gudang'])) {

            $jumlahNotifikasi = Permintaan::where('status', 2)
                ->count();

        }

        $view->with('jumlahNotifikasi', $jumlahNotifikasi);
    });
    }
}
