<?php

namespace App\Controllers;

use App\Services\HelloService;
use Core\Request;
use Core\Response;

class LoginController extends Controller
{

    /**
     * @throws \Exception
     */
    public function login(Request $request): bool|string
    {
        return view('dashboard/login.view', [
            'bonk' => [
                'bonk' => $request,
            ]
        ]);
    }
}