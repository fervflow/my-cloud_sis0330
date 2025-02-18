<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UsuarioService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UsuarioService::class, function () {
            return new UsuarioService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
