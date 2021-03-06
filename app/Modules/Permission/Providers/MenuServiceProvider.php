<?php

namespace App\Modules\Permission\Providers;

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

        $sidebar->plugins->addSubItem('permission', 'Permissão', '#')
            ->data('isMenu', true)
            ->data("icon", 'fa fa-user')
            ->activateOnUrls('admin/permission/*');

        $sidebar->plugins->permission->addSubItem("permission_overview", "Visão geral", 'admin/permission');
        $sidebar->plugins->permission->addSubItem("permission_manager_permission", "Gerenciar Permissões", 'admin/permission/manager/permission')
            ->activateOnUrls('admin/permission/manager/permission/*');
        $sidebar->plugins->permission->addSubItem("permission_manager_user", "Gerenciar Usuários", 'admin/permission/manager/user')
            ->activateOnUrls('admin/permission/manager/user/*');
        $sidebar->plugins->permission->addSubItem("permission_manager_group", "Gerenciar Grupos", 'admin/permission/manager/group')
            ->activateOnUrls('admin/permission/manager/group/*');
        $sidebar->plugins->permission->addSubItem("permission_config", "Configuração", 'admin/permission/config');
    }
}
