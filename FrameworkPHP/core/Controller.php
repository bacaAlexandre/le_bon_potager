<?php

class Controller {

    private $session;
    private $flash;

    public function __construct()
    {
        $this->session = new Session();
        $this->flash = $this->session->get_flash();
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

    public function flash($key, $value = null)
    {
        if ($value !== null) {
            $this->session->set_flash($key, $value);
            return true;
        }

        return array_key_exists($key, $this->flash) ? $this->flash[$key] : null;
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