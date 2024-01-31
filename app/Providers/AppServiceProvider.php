<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categoria;

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
        //aqui eu vou compartilhar todos os dados para minhas views
       $categoriasMenu = Categoria::all();
     view()->share('categoriasMenu', $categoriasMenu);
    }
}
