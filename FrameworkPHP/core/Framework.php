<?php

class Framework
{

    public static function run()
    {
        self::init();
        require CORE_PATH . "Controller.php";
        require CORE_PATH . "Database.php";
        require CORE_PATH . "Errors.php";
        require CORE_PATH . "Model.php";
        require CORE_PATH . "Route.php";
        require CORE_PATH . "Session.php";

        require CONFIG_PATH . 'config.php';
        require CONFIG_PATH . 'routes.php';

        spl_autoload_register(array(__CLASS__, 'load'));
        error_reporting(E_ALL);
        set_error_handler('Errors::errorHandler');
        set_exception_handler('Errors::exceptionHandler');

        $url = $_SERVER['QUERY_STRING'];
        if (!Route::dispatch($url)) {
            $url = PUBLIC_PATH . ltrim($url, '/');
            if (file_exists($url)) {
                header("Location:$url");
            } else {
                require VIEW_PATH . "error/404.php";
            }
        }
    }

    private static function init()
    {
        define("DS", DIRECTORY_SEPARATOR);
        define("ROOT", dirname(getcwd()) . DS);
        define("APP_PATH", ROOT . 'app' . DS);
        define("CORE_PATH", ROOT . "core" . DS);
        define("LOG_PATH", ROOT . 'logs' . DS);
        define("PUBLIC_PATH", ROOT . "public" . DS);
        define("CONFIG_PATH", APP_PATH . 'config' . DS);
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
        define("MODEL_PATH", APP_PATH . "models" . DS);
        define("VIEW_PATH", APP_PATH . "views" . DS);
        define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);
        define("PUBLIC_URL", self::get_public_url());
        define("ASSET_URL", PUBLIC_URL . "asset/");
    }

    private static function load($classname)
    {
        $array = array(
          CONTROLLER_PATH,
          MODEL_PATH,
        );
        foreach ($array as $path) {
            if (is_file($path . "$classname.php")) {
                require_once $path . "$classname.php";
            }
        }
    }

    private static function get_public_url() {
        $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
        $address = $_SERVER['SERVER_NAME'] . ((isset($_SERVER['SERVER_PORT']) && ($_SERVER['SERVER_PORT'] !== '80')) ? ':' . $_SERVER['SERVER_PORT'] : '');
        $dir =  (dirname($_SERVER['SCRIPT_NAME']) !== '\\' ? dirname($_SERVER['SCRIPT_NAME']) . "/" : '');
        return $http . '://' .$address . '/' . $dir;
    }
}