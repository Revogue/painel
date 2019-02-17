<?php

namespace App\Modules\Permission\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ManagerPermissionController extends Controller
{
    //
    function index($serverName = null, $groupName = null){



        $servers = [
            [
                'name' => 'Global',
                'id' => ''
            ],
            [
                'name' => 'Bungeecord',
            ],
            [
                'name' => 'Hub 1',
            ],
            [
                'name' => 'Hub 2',
            ],
            [
                'name' => 'Criativo',
            ],
            [
                'name' => 'Survival',
            ],
        ];


        $groups= [
            [
                'name' => 'Jogador',
                'id' => ''
            ],
            [
                'name' => 'Moderador',
                'id' => ''
            ],
            [
                'name' => 'Administrador',
                'id' => ''
            ],
            [
                'name' => 'Ajudante',
                'id' => ''
            ],
            [
                'name' => 'Fundador',
                'id' => ''
            ],
            [
                'name' => 'VIP',
                'id' => ''
            ],
        ];

        if(is_null($serverName)){
            $serverName = reset($servers)['name'];
        }

        if(is_null($groupName)){
            $groupName = reset($groups)['name'];
        }

        $permissions = [];
        for($i = 0; $i < 10; $i++)
        {
            $permissions[$i]['node'] = 'permission.teste' . ($i + 1);
            $permissions[$i]['world'] = "world";
            $permissions[$i]['expire'] = "21/11/2019 09:14:11";
            $permissions[$i]['id'] = $i+1;
        }

        return view("permission::manager.permission.index", compact('serverName', 'groupName', 'servers', 'groups', 'permissions' ));
    }
}
