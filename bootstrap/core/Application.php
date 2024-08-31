<?php

namespace Core;

class Application
{
    /**
     * @var Container
     */
    protected static Container $container;
    /**
     * @var array
     */

    protected array $server;
    /**
     * @var array
     */

    protected Request $request;

    /**
     * @param Container $container
     * @return void
     */
    public static function setContainer(Container $container): void
    {
        static::$container = $container;
    }

    /**
     * @return Container
     */
    public static function container(): Container
    {
        return static::$container;
    }

    /**
     * @throws \Exception
     */
    public static function make(string $class): mixed
    {
        return static::container()->make($class);
    }


    public static function get(string $class): mixed
    {
        return static::container()->get($class);
    }

    public static function resolve(string $class): mixed
    {
        return static::container()->resolve($class);
    }

    /**
     * @throws \Exception
     */
    public static function bind(string|array $key, mixed $resolver = null): void
    {
        static::container()->bind($key, $resolver);
    }

    /**
     *
     * @throws \ReflectionException
     */
    public function bootRoutes($routeFile, $isAuthenticable = false)
    {
        $router = require base_path($routeFile);
        $uri = parse_url($this->server['REQUEST_URI'])['path'];
        $method = $this->request->body->_method ?? $this->server['REQUEST_METHOD'];
        /** @var Router $router */
        $resolved = $router->setApp($this)
            ->route(
                method: $method,
                uri: $uri,
                isAuthenticable: $isAuthenticable
            );
        return $resolved;
    }

    /**
     * @param array $server
     * @return $this
     */
    public function start(array $server): self
    {
        $this->server = $server;
        return $this;
    }

    /**
     * @param array $request
     * @return $this
     */
    public function capture(array $request): self
    {
        $this->request = Request::capture($request, $this->server);
        return $this;
    }

    /**
     * @return void
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function serve()
    {
        $resolved = $this->bootRoutes('routes/guest.php');
        if ($resolved) {
            return;
        }

        $resolved = $this->bootRoutes('routes/auth.php', isAuthenticable: true);
        if ($resolved) {
            return;
        }

        abort(404);
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }
}
