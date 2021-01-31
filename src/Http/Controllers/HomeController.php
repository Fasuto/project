<?php


namespace App\Http\Controllers;


use App\Kernel\Request;

class HomeController
{

    public function index(Request $request){
        echo 'Hello from index function';
    }

}