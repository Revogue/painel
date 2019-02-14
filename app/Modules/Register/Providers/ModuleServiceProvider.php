<?php

namespace App\Modules\Register\Providers;

use App\Modules\Register\Http\Middleware\MenuMiddleware;
use Caffeinated\Modules\Support\ServiceProvider;
use Konekt\Menu\Facades\Menu;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('register', 'Resources/Lang', 'app'), 'register');
        $this->loadViewsFrom(module_path('register', 'Resources/Views', 'app'), 'register');
        $this->loadMigrationsFrom(module_path('register', 'Database/Migrations', 'app'), 'register');
        $this->loadConfigsFrom(module_path('register', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('register', 'Database/Factories', 'app'));

    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->register(MenuServiceProvider::class);
    }

}
