<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Kernel\Request;
use App\Kernel\Response;

class HomeController
{

    public function index(Request $request){
        Response::view('home', ['activeUrl'=>$request->getUrl()]);
    }

    public function login(Request $request){
        Response::view('Auth.login', ['activeUrl'=>$request->getUrl()]);
    }

}