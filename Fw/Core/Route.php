<?php

namespace Fw\Core;

use Closure;

class Route
{
    private static array $routes = [];

    private function __construct()
    {
    }

    public static function route()
    {
        require_once 'Fw/routes.php';
    }

    public static function setRoute($action, Closure $callback)
    {
        $action = trim($action, '/');
        self::$routes[$action] = $callback;
    }

    public static function dispatch($action)
    {
        $action = trim($action, '/');
        $callback = self::$routes[$action];

        echo call_user_func($callback);
    }

    public static function getRoutes()
    {
        echo "<pre>";
        var_dump(Route::$routes);
    }
}