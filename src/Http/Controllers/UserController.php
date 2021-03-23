<?php


namespace App\Http\Controllers;


use App\Kernel\Response;
use App\Repositories\UserRepository;

class UserController
{

    public function index(){
        $repository = new UserRepository();
        $records = $repository->getAll();
        return Response::json($records);
    }

}