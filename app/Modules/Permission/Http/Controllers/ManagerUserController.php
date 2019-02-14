<?php

namespace App\Modules\Permission\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class ManagerUserController extends Controller
{
    //
    function index(){


        $route = Route::getFacadeRoot()->current()->uri();;
        $server['id'] = 1;
        $groups[] = 'Jogador';
        $groups[] = 'VIP';
        $groups[] = 'Fundador';

        $users[0]['user'] = 'lucasdidur';
        $users[0]['id'] = 1;

        $users[1]['user'] = 'cassio';
        $users[1]['id'] = 2;

        $users[2]['user'] = 'marcos3ds';
        $users[2]['id'] = 3;

        $users[3]['user'] = 'bull';
        $users[3]['id'] = 4;

        $users[4]['user'] = 'thiago';
        $users[4]['id'] = 5;

        return view("permission::manager.user.index", compact('server', 'route', 'groups', 'users'));
    }
}
