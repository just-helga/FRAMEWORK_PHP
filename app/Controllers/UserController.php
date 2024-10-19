<?php

namespace App\Controllers;

use App\Application\Helpers\Random;
use App\Application\Router\Redirect;
use App\Models\User;
use App\Application\Request\Request;
use App\Application\Auth\Auth;
use App\Services\UserService;

class UserController
{
    private UserService $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function register(Request $request)
    {
        $this->service->register($request);
    }

    public function login(Request $request)
    {
        $user = new User();
        $user = $user->find('email', $request->post('email'));

        if ($user) {
            if (password_verify($request->post('password'), $user->getPassword())) {
                $token = Random::str(50);
                $user->update([Auth::getTokenColumn() => $token]);
                setcookie(Auth::getTokenColumn(), $token);
                Redirect::to('/login');
            } else {
                // TODO: сообщение об ошибке
                Redirect::to('/login');
            }
        } else {
            // TODO: сообщение об ошибке
            Redirect::to('/login');
        }
    }

    public function logout()
    {
        unset($_COOKIE[Auth::getTokenColumn()]);
        setcookie(Auth::getTokenColumn(), NULL);
        Redirect::to('/login');
    }
}