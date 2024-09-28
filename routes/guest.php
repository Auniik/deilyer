<?php


use App\Controllers\ApiResourceController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use App\Controllers\HelloController;
use App\Controllers\HomeController;
use App\Controllers\LogoutController;
use Core\Router;


$router = new Router;

$router->get('/hello/{id}/product/{product_id}/order', HelloController::class, 'index');
$router->post('/hello/{id}/product/{product_id}/order', HelloController::class, 'store');

$router->get('/', HomeController::class, 'view');
$router->get('/get-districts/{division_id}', ApiResourceController::class, 'getDistricts');
$router->get('/get-areas/{district_id}', ApiResourceController::class, 'getAreas');

$router->post('/login', LoginController::class, 'login');
$router->post('/register', RegisterController::class, 'register');

$router->get('/logout', LogoutController::class, 'logout');

return $router;