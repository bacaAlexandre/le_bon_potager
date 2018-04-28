<?php

require CONFIG_PATH . "routes.php";

class Route
{

    private static $routes = [];

    private $route;
    private $controller;
    private $action;
    private $method;
    private $group;

    private function __construct($route, $path, $group, $method = 'GET')
    {
        $path = preg_split('/@/', $path);
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace_callback('/\{([a-z]+)(?:\:([^\}]+))?\}/', function($match) {
            return empty($match[2]) ? "(?P<$match[1]>[a-zA-Z0-9]+)" : "(?P<$match[1]>$match[2])";
        }, $route);
        $route= '/^' . $route . '$/';
        $this->route = $route;
        $this->controller = $path[0];
        $this->action = (empty($path[1])) ? 'index' : $path[1];
        $this->method = $method;
        $this->group = $group;
    }

    public function get_group()
    {
        return $this->group;
    }

    public static function get($route, $path, $group = null)
    {
        self::$routes[] = new Route($route, $path, $group,'GET');
    }

    public static function post($route, $path, $group = null)
    {
        self::$routes[] = new Route($route, $path, $group, 'POST');
    }

    public static function dispatch($url)
    {
        $url = self::parse_url($url);
        $method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
        foreach (self::$routes as $route) {
            if ((preg_match($route->route, $url, $matches)) && ($method == $route->method)) {
                $controller_name = $route->controller;
                if (class_exists($controller_name)) {
                    $controller = new $controller_name($route);
                    $action = $route->action;
                    if (is_callable([$controller, $action])) {
                        $args = [];
                        foreach ($matches as $key => $match) {
                            if (is_string($key)) {
                                $args[$key] = $match;
                            }
                        }
                        if (is_callable(array($controller, 'init'))) {
                            call_user_func(array($controller, 'init'));
                        }
                        call_user_func_array(array($controller, $action), $args);
                        return true;
                    }
                }
            }
        }
        require VIEW_PATH . "error/404.php";
    }

    private static function parse_url($url) {
        if ($url != '') {
            $split = explode('&', $url, 2);
            $url = (strpos($split[0], '=') === false) ? $split[0] : '';
        }
        return '/' . rtrim($url, '/');
    }
}