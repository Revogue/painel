<?php

namespace App\Modules\Punishment\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('punishment', 'Resources/Lang', 'app'), 'punishment');
        $this->loadViewsFrom(module_path('punishment', 'Resources/Views', 'app'), 'punishment');
        $this->loadMigrationsFrom(module_path('punishment', 'Database/Migrations', 'app'), 'punishment');
        $this->loadConfigsFrom(module_path('punishment', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('punishment', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
