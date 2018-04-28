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
        $url = $_SERVER['QUERY_STRING'];
        Route::dispatch($url);
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
        define("PUBLIC_URL", self::get_public_url());
        define("ASSET_URL", PUBLIC_URL . "asset/");
        define("TITLE", "Le bon potager");
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