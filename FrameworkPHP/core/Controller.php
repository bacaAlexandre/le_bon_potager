<?php

class Controller {

    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function redirect($path, $args = [])
    {
        $uri = Route::get_uri($path, $args);
        header("Location:$uri");
        exit;
    }

    public function session()
    {
        return $this->session;
    }

    public function display($view, $args = [])
    {
        $view_path = preg_replace('/\./', DS, $view);
        if (file_exists(VIEW_PATH . "$view_path.php")) {
            foreach ($args as $key => $value) {
                $$key = $value;
            }
            require VIEW_PATH . "$view_path.php";
            return true;
        }
        return false;
    }
}