<?php

class Controller {

    private $session;
    private $flash;
    private $route;

    public function __construct($route)
    {
        $this->session = new Session();
        $this->flash = $this->session->get_flash();
        $this->route = $route;
    }

    public function redirect($url) {
        header("Location:$url");
        return true;
    }

    public function is_group($group)
    {
        return $this->route->get_group() === $group;
    }

    public function view($route) {
        return PUBLIC_URL . trim($route, '/');
    }

    public function input($name) {
        if (isset($_POST[$name])) {
            $value = $_POST[$name];
            $value = trim($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            $value = addslashes($value);
            return $value;
        }
        return false;
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
        foreach ($args as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require VIEW_PATH . "$view_path.php";
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }
}