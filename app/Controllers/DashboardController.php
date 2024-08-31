<?php

namespace App\Controllers;

class DashboardController extends Controller
{
    public function home()
    {
        return view('dashboard/home.view');
    }
}