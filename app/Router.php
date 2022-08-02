<?php

namespace App;


use Core\Request;

class Router
{

    protected static array $routes = [];

    /**
     * @param array $routes
     */
    public static function setRoutes(string $routesPath)
    {
        self:: $routes = include $routesPath;
    }


    public static function dispatch(?Request $request): void
    {
        if (self::$routes[$request->path()] ?? false) {
            echo "exist request";

        } else {
            echo "not ffound page";
        }
    }


    public function get($string, array $array): void
    {

    }

    public function post($string, array $array): void
    {
    }
}