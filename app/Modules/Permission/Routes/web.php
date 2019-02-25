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

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'permission'], function () {
        Route::get('/', 'ManagerPermissionController@index')
            ->name('permission.edit');

        Route::get('manager/permission/{serverName?}/{groupName?}', 'ManagerPermissionController@index')
            ->name("permission.edit.permission");

        Route::get('manager/user/{serverName?}/{groupName?}', 'ManagerUserController@index')
            ->name('permission.edit.user');

        Route::get('manager/group/{groupName?}', 'ManagerGroupController@index')
            ->name('permission.edit.group');
    });
});
