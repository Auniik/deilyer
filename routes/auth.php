<?php


use App\Controllers\DashboardController;
use App\Controllers\ManagerController;
use Core\Router;

$router = new Router;


$router->get('/dashboard', DashboardController::class, 'home');




return $router;