<?php

namespace App;

class Router
{

    protected array $routes = [];

    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($string, array $array): void
    {

    }

    public function post($string, array $array): void
    {
    }

    public function dispatch($url): void
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            return "404";
        }

        return call_user_func($callback);
    }
}