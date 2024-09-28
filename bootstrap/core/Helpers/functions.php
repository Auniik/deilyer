<?php


if (!function_exists('base_path')) {
    function base_path(string $path = ''): string
    {
        if (!$path) {
            return  BASE_PATH;
        }

        return BASE_PATH . DIRECTORY_SEPARATOR . $path;
    }
}

if (!function_exists('config_path')) {
    function config_path(): string
    {
        return BASE_PATH . DIRECTORY_SEPARATOR . 'config';
    }
}

if (!function_exists('static_path')) {
    function static_path(string $path = ''): string
    {
        return BASE_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'static' . $path;
    }
}

if (!function_exists('public_path')) {
    function public_path(string $path = ''): string
    {
        return BASE_PATH . DIRECTORY_SEPARATOR . 'public' . $path;
    }
}

if (!function_exists('view_path')) {
    function view_path(string $path = ''): string
    {
        return BASE_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $path;
    }
}

if (!function_exists('config')) {
    function config(string $file): mixed
    {
        return include BASE_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . "$file.php";
    }
}

if (!function_exists('abort')) {
    /**
     * @throws Exception
     */
    function abort($code = 404)
    {
        $viewEngine = view("errors/$code.view");
        return $viewEngine->dispatch();
    }
}


if (!function_exists('view')) {
    /**
     * @throws Exception
     */
    function view($path, $context = []): \Core\View
    {
        $viewEngine = new \Core\View();
        $viewEngine->render($path, $context);
        return $viewEngine;
    }
}
