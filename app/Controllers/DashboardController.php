<?php

namespace App\Controllers;

use Core\View;
use Delight\Auth\Auth;
use Delight\Auth\Role;

class DashboardController extends Controller
{
    public function home(): View
    {
        return view('dashboard/managers/home.view', [
            'bonk' => [
                'bonk' => 'bonk',
                'bonk2' => 'bonk'
            ]
        ]);
    }
}