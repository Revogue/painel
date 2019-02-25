<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'permission'], function () {


    Route::group(['prefix' => 'user'], function () {

        // Adicionar permissão a um usuario
        // Remover permissão a um usuario

        // Definir prefixo a um usuario
        // Remover prefixo a um usuario

        // Definir suffixo a um usuario
        // Remover suffixo a um usuario

    });

    Route::group(['prefix' => 'group'], function () {

        // Adicionar novo grupo
        Route::post('/',            'Resource\GroupResourceController@create');
        // Remover grupo
        Route::delete('/{idGroup}', 'Resource\GroupResourceController@delete');

        // Definir nome, rank, ladder
        Route::put('/{idGroup}',    'Resource\GroupResourceController@update');

        // Adicionar Remover parrent
        Route::group(['prefix' => 'parent'], function () {
            Route::post('/',                    'Resource\GroupParentResourceController@create');
            Route::delete('/{idGroupParent}',   'Resource\GroupParentResourceController@delete');
        });

        // Adicionar Remover prefixo
        Route::group(['prefix' => 'prefix'], function () {
            Route::post('/',               'Resource\GroupPrefixResourceController@create');
            Route::delete('/{idPrefix}',   'Resource\GroupPrefixResourceController@delete');
        });

        // Adicionar Remover suffixo
        Route::group(['prefix' => 'suffix'], function () {
            Route::post('/',               'Resource\GroupSuffixResourceController@create');
            Route::delete('/{idSuffix}',   'Resource\GroupSuffixResourceController@delete');
        });

        // Adicionar Remover permissao
        Route::group(['prefix' => 'permission'], function () {
            Route::post('/',                'Resource\GroupPermissionResourceController@create');
            Route::delete('/{idPermission}','Resource\GroupPermissionResourceController@delete');
        });

        // Adicionar Remover usuarios
        Route::group(['prefix' => 'user'], function () {
            Route::post('/',                'Resource\GroupUserResourceController@create');
            Route::delete('/{idGroupPlayer}','Resource\GroupUserResourceController@delete');
        });

    });

});
