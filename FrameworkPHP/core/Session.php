<?php

class Session
{
    private $t_utilisateur;
    private $t_login;

    public function __construct()
    {
        $this->t_utilisateur = new UserModel('T_UTILISATEURS');
        $this->t_login = new Model('T_LOGIN');
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function set_flash($key, $value)
    {
        $_SESSION['flash'][$key] = $value;
        return $_SESSION['flash'][$key];
    }

    public function get($key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return null;

    }

    public function get_flash()
    {
        if (isset($_SESSION['flash'])) {
            $array = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $array;
        }
        return array();
    }

    public function login($userId)
    {
        $this->set('userId', $userId);
        $selector = base64_encode(random_bytes(8));
        $token = bin2hex(random_bytes(32));
        $cookieValue = $selector . ':' . base64_encode($token);
        $hashedToken = hash('sha256', $token);
        $timestamp = time() + (86400 * 14);
        $datetime = date('Y-m-d H:i:s', $timestamp);
        setcookie('authToken', $cookieValue, $timestamp, NULL, NULL, NULL, true);
        $this->t_login->insert(array(
            'logSelector' => "'$selector'",
            'logToken' => "'$hashedToken'",
            'logExpires' => "'$datetime'",
            'logUtilisateur_id' => "'$userId'",
        ));
    }

    public function is_logged()
    {
        if($this->get_user_id() !== null){
            return true;
        }

        if(isset($_COOKIE['authToken'])){
            $parts = explode(':', $_COOKIE['authToken']);

            $result = $this->t_login->find(array(
                'logSelector' => "'$parts[0]'",
            ));

            if($result) {
                if (hash_equals($result->logToken, hash('sha256', base64_decode($parts[1])))) {
                    $_SESSION['userId'] = $result->logUtilisateur_id;
                    return true;
                } else {
                    $this->logOut();
                }
            }
        }
        return false;
    }

    public function logout()
    {
        $parts = explode(':', $_COOKIE['authToken']);
        $this->t_login->delete(array(
            'logSelector' => "'$parts[0]'",
        ));
        setcookie('authToken', '', 1);
        unset($_COOKIE['authToken']);
        unset($_SESSION['userId']);
    }

    public function get_user_id()
    {
        return $this->get('userId');
    }

    public function get_role() {
        $user_id = $this->get_user_id();
        if($user_id !== null){
            $row = $this->t_utilisateur->findRole($user_id);
            return $row->rolNom;
        }
        return false;
    }

    public function get_pseudo() {
        $user_id = $this->get_user_id();
        if($user_id !== null){
            $row = $this->t_utilisateur->findUtilisateur($user_id);
            return $row->utiPseudo;
        }
        return false;
    }
    public function get_email() {
        $user_id = $this->get_user_id();
        if($user_id !== null){
            $row = $this->t_utilisateur->findUtilisateur($user_id);
            return $row->utiEmail;
        }
        return false;
    }
    public function get_tel() {
        $user_id = $this->get_user_id();
        if($user_id !== null){
            $row = $this->t_utilisateur->findUtilisateur($user_id);
            return $row->utiTel;
        }
        return false;
    }
}