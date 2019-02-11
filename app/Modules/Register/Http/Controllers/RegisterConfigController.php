<?php

namespace App\Modules\Register\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class RegisterConfigController extends Controller
{
    //
    function index(){
        return view('register::config.index');
    }
}
