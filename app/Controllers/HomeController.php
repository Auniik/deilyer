<?php

namespace App\Controllers;

use App\Services\HelloService;
use Core\Request;
use Core\Response;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @throws \Exception
     */
    public function view(Request $request)
    {
        return view('app/home.view', [
            'bonk' => [
                'bonk' => $request,
                'bonk2'=> 'bonk'
            ]
        ]);
    }
}