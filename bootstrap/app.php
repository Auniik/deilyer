<?php


use Core\Application;

require_once __DIR__ . '/exceptions.php';

$dotenv = Dotenv\Dotenv::createImmutable(base_path('/'));
$dotenv->load();

$app = new Application;

$boot = require BASE_PATH . DIRECTORY_SEPARATOR . 'bootstrap/bindings.php';

$boot($app);

return $app;