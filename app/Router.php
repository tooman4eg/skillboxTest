<?php

namespace App;

use Core\Request;
use \Exception;

class Router
{

    protected array $routes = [];

    /**
     */
    public function getRoutes()
    {
        return $this->routes;
    }


    /**
     * @throws \Exception
     */
    public function dispatch(?Request $request)
    {
        $handler = $this->routes[$request->method()][$request->path()] ?? null;

        if (is_null(($handler))) {
            throw new \RuntimeException('not found');
        }
        return call_user_func([new $handler[0], $handler[1]], []);
    }

    public function get($string, array $array): void
    {
        $this->routes['GET'] [$string] = $array;
    }

    public function post($string, array $array): void
    {
        $this->routes['POST'][$string] = $array;
    }
}