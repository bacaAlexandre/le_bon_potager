<?php

class ConnexionInscriptionController extends Controller
{
    public function index()
    {
        $this->display('connexionInscription.index');
    }

    public function connexion()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $message = "";
        $error = false;

        if (empty($email)) {
            $error = true;
            $message = "champ email vide";
        } elseif (empty($password)) {
            $error = true;
            $message = "champ password vide";
        } elseif (preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$", $password)) {
            $error = true;
            $message = "format mot de passe invalide";
        }
        if ($error == true) {
            return $this->display('connexionInscription.index', array(
                'erreur' => $message,
                'email_connexion' => $email,
            ));
        }
    }

    public function inscription()
    {
        $error = false;
        if (empty($_POST['email'])) {
            $error = true;
            $message = "champ email vide";
        } elseif (empty($_POST['password'])) {
            $error = true;
            $message = "champ password vide";
        } elseif (empty($_POST['password_repeat'])) {
            $error = true;
            $message = "champ 2ème password vide";
        } elseif (empty($_POST['pseudo'])) {
            $error = true;
            $message = "champ pseudo vide";
        } elseif (empty($_POST['address'])) {
            $error = true;
            $message = "champ adresse vide";
        } elseif (empty($_POST['postal_code'])) {
            $error = true;
            $message = "champ code postal vide";
        } elseif (empty($_POST['city'])) {
            $error = true;
            $message = "champ ville vide";
        }

        if ($error == true) {
            return $this->display('connexionInscription.index', array(
                'erreur' => $message,
                'email' => $_POST['email'],
                'pseudo' => $_POST['pseudo'],
                'address' => $_POST['address'],
                'postal_code' => $_POST['postal_code'],
                'city' => $_POST['city'],
            ));
        }
    }


}