<?php


use App\Models\User;
use Core\Container;

if (!function_exists('container')) {
    function container(): Container
    {
        global /** @var \Core\Application $app */
        $app;
        return $app::container();
    }
}

if (!function_exists('auth')) {
    function auth(): Delight\Auth\Auth
    {
        return container()->make('auth'); // Retrieve the 'auth' instance from the container
    }
}


if (!function_exists('user')) {
    function user(): ?stdClass
    {
        $id = auth()->id();
        return User::query()->find($id);
    }
}