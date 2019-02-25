<?php

namespace App\Modules\Permission\Http\Controllers;

use App\Modules\Permission\Http\Services\PowerfullPermsPermissionImpl;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ManagerPermissionController extends Controller
{
    //
    function index($serverName = null, $groupName = null){

        $perm = new PowerfullPermsPermissionImpl();

        $servers = [
            [
                'name' => 'Global',
                'id' => 'all'
            ],
            [
                'name' => 'Bungeecord',
                'id' => 'bungeecord',
            ],
            [
                'name' => 'Hub 1',
                'id' => 'hub1',
            ],
            [
                'name' => 'SkyBlock 1',
                'id' => 'skyblock1',
            ],
            [
                'name' => 'Criativo 1',
                'id' => 'criativo1',
            ],
            [
                'name' => 'Survival',
                'id' => 'survival',
            ],
        ];

        $groups = $perm->getGroups();

        if(is_null($serverName)){
            $serverName = reset($servers)['id'];
        }

        if(is_null($groupName)){
            $groupName = reset($groups)['name'];
        }

        $group = $perm->getGroupByName($groupName);

        $permissions = $perm->getPermissions($group['id'], $serverName);

        return view("permission::manager.permission.index", compact('serverName', 'groupName', 'servers', 'groups', 'permissions' ));
    }
}
