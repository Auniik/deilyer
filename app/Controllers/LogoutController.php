<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Core\Response;

class LogoutController extends Controller
{
    public function logout()
    {
        auth()->logOut();
        return Response::redirect('/');
    }
}