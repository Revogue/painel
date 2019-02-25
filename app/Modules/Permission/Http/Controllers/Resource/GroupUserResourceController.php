<?php

namespace App\Modules\Permission\Http\Controllers\Resource;

use App\Modules\Permission\Http\Services\Permission;
use App\Modules\Permission\Http\Services\PowerfullPermsPermissionImpl;
use Exception;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class GroupUserResourceController extends Controller
{

    var $permManager;

    public function __construct()
    {
        $this->permManager = new PowerfullPermsPermissionImpl();
    }

    public function create(Request $request){
        try{
            $users = explode("\n", $request->get('users'));
            $serverName = $request->get('serverName', null);
            $expires = $request->get('expires', null);

            $id = [];
            foreach ($users as $user){
                $grupos = $request->get('groups');

                foreach ($grupos as $grupo){
                    $id[] = $this->permManager->addUserGroup($grupo, $user, $serverName, $expires);
                }
            }

            return response()->json(['success' => true, 'id' => $id], Response::HTTP_CREATED);

        }catch (Exception $e){
            return response()->json(['success' => false, 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function delete($idPlayerGroup){
        try{
             $this->permManager->removeUserGroup($idPlayerGroup);

            return response()->json(['success' => true], Response::HTTP_OK);
        }catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
