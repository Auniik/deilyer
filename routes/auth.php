<?php


use App\Controllers\CustomerController;
use App\Controllers\DashboardController;
use App\Controllers\DeliveryMenController;
use App\Controllers\ManagerController;
use App\Controllers\OrderController;
use App\Controllers\OrderSegmentController;
use Core\Router;

$router = new Router;


$router->get('/dashboard', DashboardController::class, 'home');

$router->get('/managers/list', ManagerController::class, 'index');
$router->get('/managers/create', ManagerController::class, 'create');
$router->get('/managers/{id}/edit', ManagerController::class, 'edit');
$router->post('/managers', ManagerController::class, 'store');



$router->get('/delivery-mens/list', DeliveryMenController::class, 'index');
$router->get('/delivery-mens/create', DeliveryMenController::class, 'create');
$router->get('/delivery-mens/{id}/edit', DeliveryMenController::class, 'edit');
$router->post('/delivery-mens', DeliveryMenController::class, 'store');

$router->get('/customers', CustomerController::class, 'index');

$router->get('/orders/list', OrderController::class, 'index');
$router->get('/orders/create', OrderController::class, 'create');
$router->get('/orders/{id}/edit', OrderController::class, 'edit');
$router->post('/orders', OrderController::class, 'store');


$router->get('/order-segments/list', OrderSegmentController::class, 'index');
$router->post('/order-segments', OrderSegmentController::class, 'store');
//$router->post('/order-segments/update', OrderSegmentController::class, 'update');


return $router;