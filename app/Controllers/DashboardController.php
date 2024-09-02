<?php

namespace App\Controllers;

class DashboardController extends Controller
{
    public function home(): bool|string
    {
        return view('dashboard/managers/home.view', [
            'bonk' => [
                'bonk' => 'bonk',
                'bonk2' => 'bonk'
            ]
        ]);
    }
}