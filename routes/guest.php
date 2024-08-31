<?php


use App\Controllers\Auth\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\HelloController;
use App\Controllers\HomeController;
use Core\Router;


$router = new Router;

$router->get('/hello/{id}/product/{product_id}/order', HelloController::class, 'index');
$router->post('/hello/{id}/product/{product_id}/order', HelloController::class, 'store');

$router->get('/', HomeController::class, 'view');

$router->post('/login', LoginController::class, 'login');

$router->get('/dashboard', DashboardController::class, 'home');

return $router;