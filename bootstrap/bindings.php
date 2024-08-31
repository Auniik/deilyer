<?php

use Core\Application;
use Core\Container;
use Core\Database;
use Delight\Auth\Auth;

return function (Application $app) {
    $app->setContainer(new Container);
    $app->bind([
        'config' => fn () => 'bonk',
        'db' => fn() => Database::pdo()
    ]);
    $app->bind([
        'auth' => function () use ($app) {
            return new Auth($app->make('db'));
        }
    ]);
};
