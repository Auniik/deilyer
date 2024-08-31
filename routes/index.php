<?php


use App\Controllers\HelloController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Core\Router;


$router = new Router;

$router->get('/hello/{id}/product/{product_id}/order', HelloController::class, 'index');
$router->post('/hello/{id}/product/{product_id}/order', HelloController::class, 'store');

$router->get('/', HomeController::class, 'view');

$router->get('/login', LoginController::class, 'view');
$router->post('/login', LoginController::class, 'login');



return $router;