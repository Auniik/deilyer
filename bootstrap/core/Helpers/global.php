<?php


use App\Models\User;
use Core\Container;
use Delight\Auth\Role;

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

if (!function_exists('is_manager')) {
    function is_manager(): bool
    {
        if (!auth()->isLoggedIn()) {
            return false;
        }
        return auth()->hasAnyRole(Role::MANAGER) || is_admin();
    }
}

if (!function_exists('is_delivery_men')) {
    function is_delivery_men(): bool
    {

        if (!auth()->isLoggedIn()) {
            return false;
        }

        return auth()->hasRole(Role::COORDINATOR) || is_admin();
    }
}
if (!function_exists('is_admin')) {
    function is_admin(): bool
    {
        if (!auth()->isLoggedIn()) {
            return false;
        }
        return !auth()->getRoles();
    }
}

if (!function_exists('is_customer')) {
    function is_customer(): bool
    {
        if (!auth()->isLoggedIn()) {
            return false;
        }
        return auth()->hasAnyRole(Role::CONSUMER) || is_admin();
    }
}