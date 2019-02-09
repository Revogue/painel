<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {

        $menu = Menu::create('bulma', [
            'active_element' => 'link',
            'active_class'   => 'menu-open',
            'share'          => 'bulmaMenu'
        ]);

        $menu->addItem('menu', 'Menu')->data('isMenu', true);
        $menu->menu->addSubItem('calendar', 'Calendar', '/calendar')
            ->data('icon', 'fa fa-calendar')
            ->data('tray', 'New');
        $menu->menu->addSubItem('documentation', 'Documentation', '/customers')->data('icon', 'glyphicon glyphicon-book');

        $menu->addItem('elements', 'Elements')->data('isMenu', true);
        $menu->elements->addSubItem('pages', 'Pages', [
            'url' => '/dasdasdas'
        ])->data('icon', 'glyphicon glyphicon-duplicate');

        $menu->elements->pages->addSubItem('basic', 'Basic', [
            'url' => '/dasdasdas'
        ])->data('icon', 'fa fa-desktop');
        $menu->elements->pages->basic->addSubItem('search_results', 'Search Results', '/search')->data('tray', 'New');
        $menu->elements->pages->basic->addSubItem('profiles', 'Profiles', '/profiles');



        return view('admin::index');
    });
});
