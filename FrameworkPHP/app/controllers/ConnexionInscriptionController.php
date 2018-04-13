<?php

class ConnexionInscriptionController extends Controller
{

    private $t_departement;
    private $t_ville;
    private $t_code_postal;
    private $t_utilisateurs;

    public function __construct()
    {
        parent::__construct();
        $this->t_departement = new Model('T_DEPARTEMENT');
        $this->t_code_postal = new Model('T_CODE_POSTAL');
        $this->t_ville = new Model('T_VILLE');
        $this->t_utilisateurs = new Model('T_UTILISATEURS');
    }

    public function index()
    {
        if ($this->session()->is_logged()) {
            return $this->redirect('AccueilController@index');
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
        $error = array();
        $email = $this->input('email');
        $password = $this->input('password');

        if (empty($email)) {
            $error[] = "Vous devez rentrer votre email";
        }
        if (empty($password)) {
            $error[] = "Vous devez rentrer votre mot de passe";
        }

        if (count($error) === 0) {
            $data = $this->t_utilisateurs->find(array(
                'utiEmail' => "'$email'",
            ));
            if ($data) {
                if ($data->utiToken !== null) {
                    $error[] = "Votre devez confirmer votre compte avant de vous connecter";
                } elseif ($data->utiMdp !== sha1($password)) {
                    $error[] = "Votre email et votre mot de passe ne correspondent pas";
                } else {
                    $this->session()->login($data->id_utilisateur);
                    return $this->redirect('AccueilController@index');
                }
            } else {
                $error[] = "Ce compte n'existe pas";
            }
        }
        $this->flash('error_connexion', $error);
        $this->flash('email_connexion', $email);
        return $this->redirect('ConnexionInscriptionController@index');

    }

    public function inscription()
    {
        $error = array();
        $email = $this->input('email');
        $password = $this->input('password');
        $password_repeat = $this->input('password_repeat');
        $pseudo = $this->input('pseudo');
        $address = $this->input('address');
        $phone = $this->input('phone');
        $biography = $this->input('biography');
        $department = $this->input('department');
        $postal_code = $this->input('postal_code');
        $city = $this->input('city');

        if (empty($email)) {
            $error[] = "Vous devez rentrer un email";
        } else if ($this->t_utilisateurs->find(array('utiEmail' => "'$email'"))) {
            $error[] = "Cette adresse email est déjà utilisée";
        }
        if (empty($password)) {
            $error[] = "Vous devez rentrer un mot de passe";
        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$/", $_POST['password'])) {
            $error[] = "Votre mot de passe doit contenir au minimum 8 caractères, une miniscule, une majuscule et un chiffre.";
        }
        if ($password !== $password_repeat) {
            $error[] = "Votre mot de passe et votre confirmation de mot de passe ne correspondent pas.";
        }
        if (empty($pseudo)) {
            $error[] = "Vous devez entrer un pseudo";
        }
        if (empty($address)) {
            $error[] = "Vous devez entrer une adresse";
        }
        if (empty($postal_code)) {
            $error[] = "Vous devez entrer un code postal";
        }
        if (empty($city)) {
            $error[] = "Vous devez entrer une ville";
        }

        if (count($error) === 0) {
            $token = sha1(bin2hex(time()));
            $this->t_utilisateurs->insert([
                'utiPseudo' => $pseudo,
                'utiEmail' => $email,
                'utiMdp' => sha1($password),
                'utiToken' => $token,
                'utiAdresse' => $address,
                'utiRole_id' => '1',
                'utiCp_id' => $postal_code,
            ]);

            $message = "<h1>Bienvenue au bon potager !</h1>";
            $message .= "<p>Vous etes maintenant inscrit sur le site.</p>";
            $message .= "<p>Merci de cliquer sur le lien pour valider votre inscription.</p>";
            $message .= "<p><a href='" . Route::get_uri('ConnexionInscriptionController@confirm', ['token' => $token]);
            $message .= "' target='_blank'>Valider mon inscription</a>";

            ini_set("smtp_port", "1025");
            mail($email, 'Confirmation compte', $message);

            $message = "<p>Vous vous êtes bien enregistré. Un email de confirmation à été envoyé à $email</p>";
            $this->flash('success_registration', $message);
            return $this->redirect('ConnexionInscriptionController@index');
        }
        $this->flash('error_registration', $error);
        $this->flash('email_registration', $email);
        $this->flash('pseudo', $pseudo);
        $this->flash('address', $address);
        $this->flash('postal_code', $postal_code);
        $this->flash('city', $city);
        $this->flash('phone', $phone);
        $this->flash('department', $department);
        $this->flash('biography', $biography);
        return $this->redirect('ConnexionInscriptionController@index');
    }

    public function confirm($token) {
        $data = $this->t_utilisateurs->find(array(
            'utiToken' => "'$token'",
        ));
        if ($data) {
            $this->t_utilisateurs->update(array(
                'id_utilisateur' => $data->id_utilisateur,
            ), array(
                'utiToken' => 'NULL',
            ));
            $message = "<p>Votre compte a bien été confirmé.</p>";
            $this->flash('success_registration', $message);
        }
        return $this->redirect('ConnexionInscriptionController@index');
    }

    public function logout() {
        if ($this->session()->is_logged()) {
            $this->session()->logout();
        }
        return $this->redirect('AccueilController@index');
    }
}