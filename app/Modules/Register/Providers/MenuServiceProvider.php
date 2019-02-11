<?php

namespace App\Modules\Register\Providers;

use Illuminate\Support\ServiceProvider;
use Konekt\Menu\Facades\Menu;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->createMenu();
    }

    private function createMenu()
    {
        $sidebar = Menu::get('sidebar');

        $sidebar->plugins->addSubItem('register', 'Registro', 'admin/register')
            ->data('isMenu', true)
            ->data("icon", 'fa fa-user')
            ->activateOnUrls('admin/register/*');

        $sidebar->plugins->register->addSubItem("overview", "Visão geral", 'admin/register');
        $sidebar->plugins->register->addSubItem("new", "Adicionar novo usuário", 'admin/register/new');
        $sidebar->plugins->register->addSubItem("list", "Listar Usuários", 'admin/register/list');
        $sidebar->plugins->register->addSubItem("config", "Configuração", 'admin/register/config');
    }
}
