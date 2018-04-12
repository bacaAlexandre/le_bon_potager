<?php

class ConnexionInscriptionController extends Controller
{

    public function index()
    {
        if ($this->session()->is_logged()) {
            return $this->redirect('AccueilController@index');
        }

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
            $message = "Champ email vide";
        } elseif (empty($password)) {
            $error = true;
            $message = "Champ password vide";
        } elseif (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$/", $password) == 0) {
            $error = true;
            $message = "Format mot de passe invalide";
        }
        if ($error == true) {
            $this->flash('error_connexion', "<div class='alert alert-danger' role='alert'>$message</div>");
            $this->flash('email_connexion', $email);
            return $this->redirect('ConnexionInscriptionController@index');
        } else {
            $req = new Model('T_UTILISATEURS');
            $data = $req->findBy(array(
                'utiEmail' => $email,
                'utiMdp' => $password,
            ));
            if ($data == false) {
                $this->flash('error_connexion', "<div class='alert alert-danger' role='alert'>Votre email ou votre mot de passe est incorrect</div>");
                $this->flash('email_connexion', $email);
                return $this->redirect('ConnexionInscriptionController@index');
            }else {
                $this->session()->login($data->id_utilisateur);
                return $this->redirect('AccueilController@index');
            }
        }
    }

    public function inscription()
    {
        $error = false;
        if (empty($_POST['email'])) {
            $error = true;
            $message = "Champ email vide";
        } elseif (empty($_POST['password'])) {
            $error = true;
            $message = "Champ password vide";
        } elseif (empty($_POST['password_repeat'])) {
            $error = true;
            $message = "Champ 2ème password vide";
        } elseif (empty($_POST['pseudo'])) {
            $error = true;
            $message = "Champ pseudo vide";
        } elseif (empty($_POST['address'])) {
            $error = true;
            $message = "Champ adresse vide";
        } elseif (empty($_POST['postal_code'])) {
            $error = true;
            $message = "Champ code postal vide";
        } elseif (empty($_POST['city'])) {
            $error = true;
            $message = "Champ ville vide";
        } elseif ($_POST['password'] != $_POST['password_repeat']) {
            $error = true;
            $message = "Les 2 mot de passe ne sont pas identique";
        } elseif (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$/", $_POST['password']) == 0) {
            $error = true;
            $message = "Format mot de passe invalide";
        }

        if ($error == true) {
            $this->flash('error_registration', $message);
            $this->flash('email_registration', $_POST['email']);
            $this->flash('pseudo', $_POST['pseudo']);
            $this->flash('address', $_POST['address']);
            $this->flash('postal_code', $_POST['postal_code']);
            $this->flash('city', $_POST['city']);
            $this->flash('department', $_POST['dep']);
            $this->flash('phone', $_POST['phone']);
            $this->flash('biography', $_POST['biography']);
            return $this->redirect('ConnexionInscriptionController@index');
        } else {
            //TODO: requete pour crée l'utilisateur en bdd
        }
    }


}