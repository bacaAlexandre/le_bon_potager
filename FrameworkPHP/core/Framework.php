<?php

class Framework
{

    public static function run()
    {
        self::init();
        require CORE_PATH . "Controller.php";
        require CORE_PATH . "Database.php";
        require CORE_PATH . "Model.php";
        require CORE_PATH . "Route.php";
        require CORE_PATH . "Session.php";
        spl_autoload_register(array(__CLASS__, 'load'));
        Route::dispatch(URI);
    }

    private static function init()
    {
        define("DS", DIRECTORY_SEPARATOR);
        define("ROOT", dirname(getcwd()) . DS);
        define("APP_PATH", ROOT . 'app' . DS);
        define("CORE_PATH", ROOT . "core" . DS);
        define("PUBLIC_PATH", ROOT . "public" . DS);
        define("CONFIG_PATH", APP_PATH . 'config' . DS);
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
        define("MODEL_PATH", APP_PATH . "models" . DS);
        define("VIEW_PATH", APP_PATH . "views" . DS);
        define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);
        define("URI", self::get_uri());
        define("PUBLIC_URI", isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http' . "://" . $_SERVER['SERVER_NAME'] . ((isset($_SERVER['SERVER_PORT']) && ($_SERVER['SERVER_PORT'] !== '80')) ? ':' . $_SERVER['SERVER_PORT'] : '') . "/" . (dirname($_SERVER['SCRIPT_NAME']) !== '\\' ? dirname($_SERVER['SCRIPT_NAME']) . "/" : '') . "asset/");
        define("TITLE", "Le bon potager");
    }

    private static function load($classname)
    {
        if (substr($classname, -10) == "Controller") {
            require_once CONTROLLER_PATH . "$classname.php";
        } elseif (substr($classname, -5) == "Model") {
            require_once MODEL_PATH . "$classname.php";
        }
    }

    private static function get_uri()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = $_SERVER['REQUEST_URI'];
            if (strpos($uri, $_SERVER['SCRIPT_NAME']) === 0) {
                $uri = substr($uri, strlen($_SERVER['SCRIPT_NAME']));
            } elseif (strpos($uri, dirname($_SERVER['SCRIPT_NAME'])) === 0) {
                $uri = substr($uri, strlen(dirname($_SERVER['SCRIPT_NAME'])));
            }

            if (strncmp($uri, '?/', 2) === 0) {
                $uri = substr($uri, 2);
            }

            $parts = preg_split('#\?#i', $uri, 2);
            $uri = $parts[0];

            

            if (isset($parts[1])) {
                $_SERVER['QUERY_STRING'] = $parts[1];
                parse_str($_SERVER['QUERY_STRING'], $_GET);
            } else {
                $_SERVER['QUERY_STRING'] = '';
                $_GET = array();
            }
            $uri = parse_url($uri, PHP_URL_PATH);
            return '/' . str_replace(array('//', '../'), '/', trim($uri, '/'));
        }
        return false;
    }
}