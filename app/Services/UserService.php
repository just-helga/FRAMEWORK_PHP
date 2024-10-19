<?php

namespace App\Services;

use App\Application\Request\Request;
use App\Application\Router\Redirect;
use App\Models\User;

class UserService
{
    public function register(Request $request)
    {
        $user = new User();
        $user->setEmail($request->post('email'));
        $user->setName($request->post('name'));
        $user->setPassword($request->post('password'));
        $user->store();
        Redirect::to('/login');
    }

}