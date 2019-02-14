<?php

namespace App\Modules\Permission\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ManagerPermissionController extends Controller
{
    //
    function index(){

        $permissions = [
            'servers' => [
                'BungeeCord',
                'Hub 1',
                'Criativo',
            ],
            'groups' => [
                'Jogador',
                'Ajudante',
                'Moderador',
                'Administrador',
                'VIP',
            ],
            'permission'
        ];

        $route = Route::getFacadeRoot()->current()->uri();;
        $server['id'] = 1;
        $groups[] = 'Jogador';
        $groups[] = 'VIP';
        $groups[] = 'Fundador';

        $permissions = [];
        for($i = 0; $i < 10; $i++)
        {
            $permissions[$i]['node'] = 'permission.teste' . ($i + 1);
            $permissions[$i]['id'] = $i+1;
        }

        return view("permission::manager.permission.index", compact('server', 'route', 'groups', 'permissions'));
    }
}
