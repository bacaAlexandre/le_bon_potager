<?php

class Route
{

    private static $routes = [];

    private $uri;
    private $route;
    private $controller;
    private $action;
    private $method;

    public function __construct($uri, $path, $method = 'GET')
    {
        $path = preg_split('/@/', $path);
        $route = preg_replace('/\//', '\\/', $uri);
        $route = preg_replace_callback('/\{([a-z]+)(?:\:([^\}]+))?\}/', function($match) {
            return empty($match[2]) ? "(?P<$match[1]>[a-z]+)" : "(?P<$match[1]>$match[2])";
        }, $route);
        $this->uri = $uri;
        $this->route = '/^' . $route . '$/';
        $this->controller = $path[0];
        $this->action = (empty($path[1])) ? 'index' : $path[1];
        $this->method = $method;
    }

    public static function get($route, $path)
    {
        self::$routes[] = new Route($route, $path, 'GET');
    }

    public static function post($route, $path)
    {
        self::$routes[] = new Route($route, $path, 'POST');
    }

    public static function dispatch($url)
    {
        $url = self::parse_url($url);
        foreach (self::$routes as $route) {
            if ((preg_match($route->route, $url, $matches)) && (self::get_method() == $route->method)) {
                $controller_name = $route->controller;
                if (class_exists($controller_name)) {
                    $controller = new $controller_name();
                    $action = $route->action;
                    if (is_callable([$controller, $action])) {
                        $args = [];
                        foreach ($matches as $key => $match) {
                            if (is_string($key)) {
                                $args[$key] = $match;
                            }
                        }
                        call_user_func_array(array($controller, $action), $args);
                        return true;
                    }
                }
            }
        }
        /**
         * Erreur 404
         */
        require VIEW_PATH . "error/404.php";
    }

    public static function get_uri($path, $args = []) {
        $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
        $host = $_SERVER['SERVER_NAME'];
        $dir = dirname($_SERVER['SCRIPT_NAME']);

        if (strpos(dirname($_SERVER['SCRIPT_NAME']), '\\') === 0) {
            $dir = substr($dir, 1);
        }

        $path = preg_split('/@/', $path);
        $controller = $path[0];
        $action = (empty($path[1])) ? 'index' : $path[1];
        foreach (self::$routes as $route) {
            if (($controller == $route->controller) && ($action == $route->action)) {
                $uri = $route->uri;
                $uri = preg_replace_callback('/\{([a-z]+)(?:\:([^\}]+))?\}/', function($match) use ($args) {
                    if (array_key_exists($match[1], $args)) {
                        return $args[$match[1]];
                    }
                    return false;
                }, $uri);
                return  $http . '://' . $host . $dir . $uri;
            }
        }
        return false;
    }

    private static function get_method()
    {
        return isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
    }

    private static function parse_url($url)
    {
        $split = explode('&', $url, 2);
        $url = (strpos($split[0], '=') === false) ? $split[0] : $url;
        return $url;
    }
}