<?php

namespace App\Modules\Permission\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ManagerGroupController extends Controller
{
    //
    function index($groupName = null){

        $groups = [
            [
                'id' => 1,
                'name' => 'Jogador',
                'rank' => '1',
                'leader' => '',
                'parent' => [
                    ''
                ],
                'prefix' => [
                    [
                        'id'    => 1,
                        'value' => '[JG]',
                        'server' => 'survival',
                    ]
                ],
                'suffix' => [
                    [
                        'id'    => 1,
                        'value' => '[JG]',
                        'server' => 'survival',
                    ]
                ],
            ],
            [
                'id' => 2,
                'name' => 'Ajudante',
                'rank' => '2',
                'leader' => 1,
                'parent' => [
                    1, 2
                ],
                'prefix' => [
                    [
                        'id'    => 1,
                        'value' => '[AJD]',
                        'server' => 'hub1',
                    ],
                    [
                        'id'    => 1,
                        'value' => '&a[AJD]',
                        'server' => 'criativo',
                    ]
                ],
                'suffix' => [
                    [
                        'id'    => 1,
                        'value' => '[JG]',
                        'server' => 'hub1',
                    ]
                ],
            ],
        ];

        if(is_null($groupName)){
            $groupName = reset($groups)['name'];
        }

        $group = $groups[1];

        return view("permission::manager.group.index", compact('groupName', 'groups', 'group'));
    }
}
