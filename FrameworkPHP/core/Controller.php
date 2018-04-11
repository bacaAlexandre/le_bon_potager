<?php

class Controller{

    protected $loader;

    public function __construct()
    {
        $this->loader = new Loader();
    }

    public function redirect($path, $args = [])
    {
        $uri = Route::get_uri($path, $args);
        header("Location:$uri");
        exit;
    }

    public function display($view, $args = [])
    {
        $view_path = VIEW_PATH . preg_replace('/\./', DS, $view ). ".php";

        if (file_exists($view_path)) {
            foreach ($args as $key => $value) {
                $$key = $value;
            }
            require_once $view_path;
            return true;
        }
        return false;
    }
}