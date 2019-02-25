<?php

namespace App\Modules\Permission\Http\Controllers\Resource;

use App\Modules\Permission\Http\Services\Permission;
use App\Modules\Permission\Http\Services\PowerfullPermsPermissionImpl;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PermissionResourceController extends Controller
{

    var $permManager;

    public function __construct()
    {
        $this->permManager = new PowerfullPermsPermissionImpl();
    }

    public function add(Request $request){

        $idGroup = $request->get('idGroup');
        $node = $request->get('node');
        $serverName = $request->get('serverName', null);
        $world = $request->get('world', null);
        $expires = $request->get('expires', null);

        $result = $this->permManager->addPermission($idGroup, $node, $serverName, $world, $expires);

        if(is_numeric($result)){
            $response = ['success' => true, 'id' => $result];
            return response()->json($response, 201);
        }else {
            $response = ['success' => false];
            return response()->json($response, 400);
        }
    }
}
