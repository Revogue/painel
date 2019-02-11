<?php

namespace App\Modules\Register\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class RegisterNewController extends Controller
{
    //
    function index(){
        return view('register::new.index');
    }
}
