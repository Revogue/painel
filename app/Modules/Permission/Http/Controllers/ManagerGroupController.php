<?php

namespace App\Modules\Permission\Http\Controllers;

use App\Modules\Permission\Http\Services\PowerfullPermsPermissionImpl;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ManagerGroupController extends Controller
{
    //
    function index($groupName = null){

        $perm = new PowerfullPermsPermissionImpl();

        $groups = $perm->getGroups();

        if(is_null($groupName)){
            $groupName = reset($groups)['name'];
        }

        $group = $perm->getGroupByName($groupName);

        return view("permission::manager.group.index", compact('groupName', 'groups', 'group'));
    }
}
