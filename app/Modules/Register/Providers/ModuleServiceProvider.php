<?php

namespace App\Modules\Register\Providers;

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

        $this->createMenu();
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

    private function createMenu()
    {
        $sidebar = Menu::get('sidebar');

        $sidebar->plugins->addSubItem('register', 'Registro', '/')->data('isMenu', true)->data("icon", 'fa fa-user');
        $sidebar->plugins->register->addSubItem("overview", "Visão geral", '#');
        $sidebar->plugins->register->addSubItem("new", "Adicionar novo usuário", '#');
        $sidebar->plugins->register->addSubItem("list", "Listar Usuários", '#');
        $sidebar->plugins->register->addSubItem("config", "Configuração", '#');
    }
}
