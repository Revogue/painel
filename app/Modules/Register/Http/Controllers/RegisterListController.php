<?php

namespace App\Modules\Register\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class RegisterListController extends Controller
{
    //
    function index(){
        return view('register::list.index');
    }
}
