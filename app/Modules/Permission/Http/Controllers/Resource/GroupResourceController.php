<?php

namespace App\Modules\Permission\Http\Controllers\Resource;

use App\Modules\Permission\Http\Services\Permission;
use App\Modules\Permission\Http\Services\PowerfullPermsPermissionImpl;
use Exception;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class GroupResourceController extends Controller
{

    var $permManager;

    public function __construct()
    {
        $this->permManager = new PowerfullPermsPermissionImpl();
    }

    public function create(Request $request){

        $name = $request->get('name');
        $rank = $request->get('rank');
        $ladder = $request->get('ladder', 'default');

        $id = $this->permManager->addGroup($name, $rank, $ladder);

        if(is_numeric($id)){
            $response = ['success' => true, 'id' => $id];
            return response()->json($response, Response::HTTP_CREATED);
        }else {
            $response = ['success' => false];
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    public function delete($idGroup){

        $result = $this->permManager->removeGroup($idGroup);

        if($result){
            $response = ['success' => true];
            return response()->json($response, Response::HTTP_OK);
        }else {
            $response = ['success' => false];
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Request $request, $idGroup){
        try{
            $group = $this->permManager->getGroupById($idGroup);

            if($group){
                $newName = $request->get('name', $group['name']);
                $newRank = $request->get('rank', $group['rank']);
                $newladder = $request->get('ladder', $group['ladder']);



                $this->permManager->setName($idGroup, $newName);
                $this->permManager->setRank($idGroup, $newRank);
                $this->permManager->setLadder($idGroup, $newladder);
            }else {

            }

        }catch (Exception $e){
            $response = ['success' => false, 'message' => $e->getMessage()];
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }

        $response = ['success' => true];
        return response()->json($response, Response::HTTP_ACCEPTED);
    }

}
