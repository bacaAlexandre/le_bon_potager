<?php

class MonCompteController extends Controller
{
    private $t_utilisateurs;
    private $t_code_postal;

    public function __construct()
    {
        parent::__construct();
        $this->t_utilisateurs = new Model('T_UTILISATEURS');
        $this->t_code_postal = new Model('T_CODE_POSTAL');
    }

    public function index()
    {
        if (!$this->session()->is_logged()) {
            return $this->redirect('ConnexionInscriptionController@index');
        }
        $user = $this->session()->get_user();

        $this->display('compte.index', array(
            'postal_code' => $this->t_code_postal->findAll(),
            'adresse' => $user->utiAdresse,
            'pseudo' => $user->utiPseudo,
            'phone' => $user->utiTel,
            'description' => $user->utiDescription,
            'code_postal' => $user->utiCp_id,
            'tel_affiche' => $user->utiTelAffiche,
            'adresse_affiche' => $user->utiAdresseAffiche,
        ));
    }

    public function changeInfos()
    {
        $error = array();
        $pseudo = $this->input('pseudo');
        $address = $this->input('address');
        $phone = $this->input('tel');
        $biography = $this->input('biography');
        $postal_code = $this->input('postal_code');
        $tel_affiche = $this->input('tel_affiche') === 'on' ? '1' : '0';
        $adresse_affiche = $this->input('adresse_affiche') === 'on' ? '1' : '0';

        if (empty($pseudo)) {
            $error[] = "Vous devez entrer un pseudo";
        }
        if (empty($address)) {
            $error[] = "Vous devez entrer une adresse";
        }
        if (empty($postal_code)) {
            $error[] = "Vous devez entrer un code postal";
        }

        if (count($error) === 0) {
            $this->t_utilisateurs->update(array(
                'id_utilisateur' => $this->session()->get_user_id(),
            ), array(
                'utiPseudo' => "'$pseudo'",
                'utiAdresse' => "'$address'",
                'utiCp_id' => "'$postal_code'",
                'utiTelAffiche' => "$tel_affiche",
                'utiTel' => (empty($phone) ? "NULL" : "'$phone'"),
                'utiDescription' => (empty($biography) ? "NULL" : "'$biography'"),
                'utiAdresseAffiche' => "$adresse_affiche",
            ));
            $message = "Vos informations ont bien été mises à jour";
            $this->flash('success_change_infos', $message);
            return $this->redirect('MonCompteController@index');
        }
        $this->flash('error_change_infos', $error);
        $this->flash('pseudo', $pseudo);
        $this->flash('address', $address);
        $this->flash('postal_code', $postal_code);
        $this->flash('phone', $phone);
        $this->flash('biography', $biography);
        $this->flash('tel_affiche', $tel_affiche);
        $this->flash('adresse_affiche', $adresse_affiche);
        return $this->redirect('MonCompteController@index');
    }

    public function changePassword() {
        $error = array();
        $password_old = $this->input('password_old');
        $password_new = $this->input('password_new');
        $password_new_repeat = $this->input('password_new_repeat');

        $data = $this->t_utilisateurs->find(array(
            'id_utilisateur' => $this->session()->get_user_id(),
        ));

        if (empty($password_old)) {
            $error[] = "Vous devez votre mot de passe actuel";
        } elseif ($data->utiMdp != sha1($password_old)) {
            $error[] = "Vous avez entrer un mauvais mot de passe";
        }
        if (empty($password_new)) {
            $error[] = "Vous devez entrer un nouveau mot de passe";
        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$/", $password_new)) {
            $error[] = "Votre mot de passe doit contenir au minimum 8 caractères, une miniscule, une majuscule et un chiffre.";
        }
        if ($password_new !== $password_new_repeat) {
            $error[] = "Votre mot de passe et votre confirmation de mot de passe ne correspondent pas.";
        }

        if (count($error) === 0) {
            $this->t_utilisateurs->update(array(
                'id_utilisateur' => $this->session()->get_user_id(),
            ), array(
                'utiMdp' => "sha1('$password_new')",
            ));
            $message = "Votre mot de passe a bien été changé";
            $this->flash('success_change_password', $message);
            return $this->redirect('MonCompteController@index');
        }
        $this->flash('error_change_password', $error);
        return $this->redirect('MonCompteController@index');
    }
}