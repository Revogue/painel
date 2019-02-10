<?php

namespace App\Modules\Register\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Konekt\Menu\Facades\Menu;

class RegisterOverviewController extends Controller
{
    function overview(){
        return view('register::overview.index');
    }
}
