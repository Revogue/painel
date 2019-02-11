<?php

namespace App\Modules\Admin\Providers;

use App\Modules\Admin\Config\SidebarRightMenuRenderer;
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
        $this->loadTranslationsFrom(module_path('admin', 'Resources/Lang', 'app'), 'admin');
        $this->loadViewsFrom(module_path('admin', 'Resources/Views', 'app'), 'admin');
        $this->loadMigrationsFrom(module_path('admin', 'Database/Migrations', 'app'), 'admin');
        $this->loadConfigsFrom(module_path('admin', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('admin', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton('konekt.menu.renderer.menu.absoluteAdmin', SidebarRightMenuRenderer::class);

        $this->createMenu();
    }

    private function createMenu()
    {

        $sidebar = Menu::create('sidebar', [
            'auto_activate'     => true,
            'active_element'    => 'link',
            'active_class'      => 'menu-open',
            'share'             => 'bulmaMenu'
        ]);

        $sidebar->addItem('menu', 'Menu')->data('isMenu', true);
        $sidebar->menu->addSubItem('calendar', 'Calendar', '/calendar')
            ->data('icon', 'fa fa-calendar')
            ->data('tray', 'New');
        $sidebar->menu->addSubItem('documentation', 'Documentation', '/customers')->data('icon', 'glyphicon glyphicon-book');

        $sidebar->addItem('elements', 'Elements')->data('isMenu', true);
        $sidebar->elements->addSubItem('pages', 'Pages', [
            'url' => '/dasdasdas'
        ])->data('icon', 'glyphicon glyphicon-duplicate');

        $sidebar->elements->pages->addSubItem('basic', 'Basic', [
            'url' => '/dasdasdas'
        ])->data('icon', 'fa fa-desktop');
        $sidebar->elements->pages->basic->addSubItem('search_results', 'Search Results', '/search')->data('tray', 'New');
        $sidebar->elements->pages->basic->addSubItem('profiles', 'Profiles', '/profiles');

        $sidebar->addItem('plugins', 'Plugins   ', '/')->data('isMenu', true);


    }


}
