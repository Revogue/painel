<?php

namespace App\Modules\Permission\Http\Controllers\Resource;

use App\Modules\Permission\Http\Services\Permission;
use App\Modules\Permission\Http\Services\PowerfullPermsPermissionImpl;
use Exception;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class GroupPrefixResourceController extends Controller
{

    var $permManager;

    public function __construct()
    {
        $this->permManager = new PowerfullPermsPermissionImpl();
    }

    public function create(Request $request){
        try{
            $idGroup = $request->get('idGroup');
            $prefix = $request->get('prefix');
            $serverName = $request->get('serverName', 'all');

            $id = $this->permManager->addPrefix($idGroup, $prefix, $serverName);

        return response()->json(['success' => true, 'id' => $id], Response::HTTP_CREATED);

        }catch (Exception $e){
            return response()->json(['success' => false, 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function delete($idPrefix){
        try{
             $this->permManager->removePrefix($idPrefix);

            return response()->json(['success' => true], Response::HTTP_OK);
        }catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
