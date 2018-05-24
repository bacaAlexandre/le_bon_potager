<?php

class ConnexionInscriptionController extends Controller
{

    private $t_departement;
    private $t_ville;
    private $t_code_postal;
    private $t_utilisateurs;

    public function init() {
        $this->t_departement = new Model('T_DEPARTEMENT');
        $this->t_code_postal = new Model('T_CODE_POSTAL');
        $this->t_ville = new Model('T_VILLE');
        $this->t_utilisateurs = new Model('T_UTILISATEURS');
    }

    public function index()
    {
        if ($this->session()->is_logged()) {
            return $this->redirect($this->view('/compte'));
        }
        $department = $this->t_departement->findAll();
        $city = $this->t_ville->findAll();
        $postalCode = $this->t_code_postal->findAll();

        $this->display('connexionInscription.index',array(
            'department' => $department,
            'city' => $city,
            'postalCode' => $postalCode,
        ));
    }

    public function connexion()
    {
        $array = array();
        $email = $this->input('email');
        $password = $this->input('password');

        if (empty($email)) {
            $error['input'] = 'connexion_email';
            $error['message'] = "Veuillez renseignez votre email de connexion.";
            $array[] = $error;
        }

        if (empty($password)) {
            $error['input'] = 'connexion_password';
            $error['message'] = "Veuillez rentrer le mot de passe correspondant à votre email.";
            $array[] = $error;
        }

        if (empty($array)) {
            $data = $this->t_utilisateurs->find(array(
                'utiEmail' => "'$email'",
            ));
            if ($data) {
                if ($data->utiDesactive) {
                    $error['input'] = 'connexion_email';
                    $array['message'] = "Votre compte a été desactivé, veuillez contacter un administrateur.";
                } elseif (!$data->utiValide) {
                    $error['input'] = 'connexion_email';
                    $error['message'] = "Vous devez confirmer votre inscription avant de pouvoir vous connecter.";
                    $array[] = $error;
                } elseif ($data->utiMdp !== sha1($password)) {
                    $error['input'] = 'connexion_password';
                    $error['message'] = "Le mot de passe ne correspond pas à votre adresse email.";
                    $array[] = $error;
                } else {
                    $this->session()->login($data->id_utilisateur);
                }
            } else {
                $error['input'] = 'connexion_email';
                $error['message'] = "Cette adresse email ne s'est pas encore inscrite.";
                $array[] = $error;
            }
        }
        echo json_encode($array);
    }

    public function inscription()
    {
        $array = array();
        $email = $this->input('email');
        $password = $this->input('password');
        $password_repeat = $this->input('password_repeat');
        $pseudo = $this->input('pseudo');
        $adresse = $this->input('adresse');
        $code_postal = $this->input('code_postal');
        $tel = $this->input('tel');
        $biographie = $this->input('biographie');
        $adresse_visible = $this->input('adresse_visible');
        $tel_visible = $this->input('tel_visible');

        if (empty($email)) {
            $error['input'] = 'inscription_email';
            $error['message'] = "Vous devez rentrer un email";
            $array[] = $error;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['input'] = 'inscription_email';
            $error['message'] = "Vous devez rentrer un email valide";
            $array[] = $error;
        } elseif ($this->t_utilisateurs->find(array('utiEmail' => "'$email'"))) {
            $error['input'] = 'inscription_email';
            $error['message'] = "Cette adresse email est déjà utilisée";
            $array[] = $error;
        }
        if (empty($password)) {
            $error['input'] = 'inscription_password';
            $error['message'] = "Vous devez rentrer un mot de passe";
            $array[] = $error;
        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$/", $password)) {
            $error['input'] = 'inscription_password';
            $error['message'] = "Votre mot de passe doit contenir au minimum 8 caractères, une miniscule, une majuscule et un chiffre.";
            $array[] = $error;
        }
        if ($password !== $password_repeat) {
            $error['input'] = 'inscription_password_repeat';
            $error['message'] = "Votre mot de passe et votre confirmation de mot de passe ne correspondent pas.";
            $array[] = $error;
        }
        if (empty($pseudo)) {
            $error['input'] = 'inscription_pseudo';
            $error['message'] = "Vous devez entrer un pseudo.";
            $array[] = $error;
        }
        if (empty($adresse)) {
            $error['input'] = 'inscription_adresse';
            $error['message'] = "Vous devez entrer une adresse.";
            $array[] = $error;
        }
        if (empty($code_postal)) {
            $error['input'] = 'inscription_code_postal';
            $error['message'] = "Vous devez entrer un code postal";
            $array[] = $error;
        } else if (!$this->t_code_postal->find(array('id_code_postal' => "$code_postal"))) {
            $error['input'] = 'inscription_code_postal';
            $error['message'] = "Le code postal que vous avez entrer n'existe pas.";
            $array[] = $error;
        }


        if (count($array) === 0) {
            $token = sha1(bin2hex(time()));
            $this->t_utilisateurs->insert([
                'utiPseudo' => "'$pseudo'",
                'utiEmail' => "'$email'",
                'utiMdp' => "sha1('$password')",
                'utiToken' => "'$token'",
                'utiAdresse' => "'$adresse'",
                'utiRole_id' => "100",
                'utiTel' => "'$tel'",
                'utiDescription' => "'$biographie'",
                'utiCp_id' => "$code_postal",
                'utiTelAffiche' => "$tel_visible",
                'utiAdresseAffiche' => "$adresse_visible",
                'utiLatitude' => "0",
                'utiLongitude' => "0"
            ]);

            $message = "<h1>Bienvenue à vous sur Garden Party !</h1>";
            $message .= "<p>Vous etes maintenant inscrit sur le site.</p>";
            $message .= "<p>Merci de cliquer sur le lien pour valider votre inscription.</p>";
            $message .= "<p><a href='" . $this->view('/connexion/register/' . $token);
            $message .= "' target='_blank'>Valider mon inscription</a>";

            ini_set("smtp_port", "1025");
            mail($email, 'Confirmation compte', $message);

        }
        echo json_encode($array);
    }

    public function confirm($token) {
        $data = $this->t_utilisateurs->find(array(
            'utiToken' => "'$token'",
        ));
        if ($data) {
            $this->t_utilisateurs->update(array(
                'id_utilisateur' => $data->id_utilisateur,
            ), array(
                'utiValide' => '1',
                'utiToken' => 'NULL',
            ));
            $message = "<p>Votre compte a bien été confirmé.</p>";
            $this->flash('success_registration', $message);
        }
        return $this->redirect($this->view('/connexion'));
    }

    public function logout() {
        $this->session()->logout();
        return $this->redirect($this->view('/'));
    }
}
