<?php

namespace App\Controllers;

use Core\Container;

class Controller
{
    public function __construct(public Container $container)
    {
    }
}