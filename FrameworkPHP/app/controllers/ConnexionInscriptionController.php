<?php

class ConnexionInscriptionController extends Controller
{

    public function index()
    {
        $req = new Model('T_DEPARTEMENT');
        $department = $req->findAll();

        $req = new Model('T_VILLE');
        $city = $req->findAll();

        $req = new Model('T_CODE_POSTAL');
        $postalCode = $req->findAll();

        $this->display('connexionInscription.index',array(
            'department' => $department,
            'city' => $city,
            'postalCode' => $postalCode,
        ));
    }

    public function connexion()
    {
        var_dump("connexion");
        $req = new Model('T_DEPARTEMENT');
        $department = $req->findAll();

        $req = new Model('T_VILLE');
        $city = $req->findAll();

        $req = new Model('T_CODE_POSTAL');
        $postalCode = $req->findAll();


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
        } elseif (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$/", $password) == 0) {
            $error = true;
            $message = "format mot de passe invalide";
        }
        if ($error == true) {
            return $this->display('connexionInscription.index', array(
                'erreur' => "<div class='alert alert-danger' role='alert'>$message</div>",
                'email_connexion' => $email,
            ));
        } else {
            $req = new Model('T_UTILISATEURS');
            $data = $req->findBy(array(
                'utiEmail' => $email,
                'utiMdp' => $password,
            ));
            if ($data == false) {
                return $this->display('connexionInscription.index', array(
                    'error_connexion' => "<div class='alert alert-danger' role='alert'>Votre email ou votre mot de passe est incorrect</div>",
                    'email_connexion' => $email,
                ));
            }else {
                $this->session()->login($data->id_utilisateur);
                return $this->display('accueil.index');
                //TODO : ajout donné en section
            }
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
        } elseif ($_POST['password'] != $_POST['password_repeat']) {
            $error = true;
            $message = "Les 2 mot de passe ne sont pas identique";
        } elseif (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$/", $_POST['password']) == 0) {
            $error = true;
            $message = "format mot de passe invalide";
        }

        if ($error == true) {
            return $this->display('connexionInscription.index', array(
                'error_registration' => $message,
                'email_registration' => $_POST['email'],
                'pseudo' => $_POST['pseudo'],
                'address' => $_POST['address'],
                'postal_code' => $_POST['postal_code'],
                'city' => $_POST['city'],
            ));
        }else{
            //TODO: requete pour crée l'utilisateur en bdd
        }
    }


}