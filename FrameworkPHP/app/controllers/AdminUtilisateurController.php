<?php

class AdminUtilisateurController extends Controller
{
    private $t_utilisateurs;
    private $t_code_postal;

    public function init()
    {
        $this->t_utilisateurs = new Model('T_UTILISATEURS');
        $this->t_code_postal = new Model('T_CODE_POSTAL');
    }

    public function index()
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }
        $users = $this->t_utilisateurs->findAll();
        $this->display('adminUtilisateur.index', array(
            'users' => $users,
        ));
    }

    public function edit()
    {
        $id = $_POST['id'];
        $user = $this->t_utilisateurs->find(array('id_utilisateur' => $id));

        $codePostal = $this->t_code_postal->findAll();

        $reponse = [
            'postal_code' => $this->t_code_postal->findAll(),
                'id_utilisateur' => $user->id_utilisateur,
                'adresse' => $user->utiAdresse,
                'adresse_affiche' => $user->utiAdresseAffiche,
                'user_code_postal' => $user->utiCp_id,
                'code_postal' => $codePostal,
                'phone' => $user->utiTel,
                'tel_affiche' => $user->utiTelAffiche,
                'pseudo' => $user->utiPseudo,
                'description' => $user->utiDescription,
                'email' => $user->utiEmail,
        ];

         echo json_encode($reponse);
    }

    public function changeInfos()
    {
        $id_utilisateur = $this->input('id_utilisateur');
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }
        $user = $this->t_utilisateurs->find(array('id_utilisateur' => $id_utilisateur));
        if (($user !== null) && ($this->session()->get_user_id() !== $id_utilisateur)) {

            $adresse = $this->input('address');
            $adresse_affiche = $this->input('adresse_affiche') === 'on' ? '1' : '0';
            $code_postal = $this->input('postal_code');
            $tel = $this->input('tel');
            $tel_affiche = $this->input('tel_affiche') === 'on' ? '1' : '0';
            $pseudo = $this->input('pseudo');
            $email = $this->input('email');
            $description = $this->input('biography');

            if (empty($email)) {
                $error[] = "Vous devez rentrer un email";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "Vous devez rentrer un email valide";
            } else {
                $other = $this->t_utilisateurs->find(array('utiEmail' => "'$email'"));
                if (($other) && ($other->id_utilisateur != $id_utilisateur)) {
                    $error[] = "Cette adresse email est déjà utilisée";
                }
            }
            if (empty($pseudo)) {
                $error[] = "Vous devez entrer un pseudo";
            }
            if (empty($adresse)) {
                $error[] = "Vous devez entrer une adresse";
            }
            if (empty($code_postal)) {
                $error[] = "Vous devez entrer un code postal";
            }


            if (count($error) === 0) {
                $this->t_utilisateurs->update(array(
                    'id_utilisateur' => "$id_utilisateur",
                ), array(
                    'utiPseudo' => "'$pseudo'",
                    'utiEmail' => "'$email'",
                    'utiAdresse' => "'$adresse'",
                    'utiTel' => (empty($tel) ? "NULL" : "'$tel'"),
                    'utiDescription' => (empty($description) ? "NULL" : "'$description'"),
                    'utiCp_id' => "'$code_postal'",
                    'utiTelAffiche' => "$tel_affiche",
                    'utiAdresseAffiche' => "$adresse_affiche",
                ));
                $message = "Les informations de l'utilisateur ont bien été changées";
                $this->flash('success_change_infos', $message);
                return $this->redirect($this->view('/admin/utilisateur/' . $id_utilisateur . '/edit'));
            }
            $this->flash('error_change_infos', $error);
            $this->flash('email', $email);
            $this->flash('pseudo', $pseudo);
            $this->flash('address', $adresse);
            $this->flash('postal_code', $code_postal);
            $this->flash('phone', $tel);
            $this->flash('biography', $description);
            $this->flash('tel_affiche', $tel_affiche);
            $this->flash('adresse_affiche', $adresse_affiche);
            return $this->redirect($this->view('/admin/utilisateur/' . $id_utilisateur . '/edit'));
        }
        return $this->redirect($this->view('/admin/utilisateur'));
    }

    public function changePassword()
    {
        $id_utilisateur = $this->input('id_utilisateur');
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }
        $user = $this->t_utilisateurs->find(array('id_utilisateur' => $id_utilisateur));
        if (($user !== null) && ($this->session()->get_user_id() !== $id_utilisateur)) {
            $error = array();
            $password = $this->input('password');
            if (empty($password)) {
                $error[] = "Vous devez entrer un nouveau mot de passe";
            } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$/", $password)) {
                $error[] = "Le mot de passe doit contenir au minimum 8 caractères, une miniscule, une majuscule et un chiffre.";
            }
            if (count($error) === 0) {
                $this->t_utilisateurs->update(array(
                    'id_utilisateur' => $id_utilisateur,
                ), array(
                    'utiMdp' => "sha1('$password')",
                ));
                $message = "<p>Votre mot de passe a ete change par un administrateur.</p>";
                $message .= "<p>Votre nouveau mot de passe: <span style='color:blue'>$password</span></p>";

                ini_set("smtp_port", "1025");
                mail($user->utiEmail, 'Changement de mot passe', $message);

                $message = "Le mot de passe de l'utilisateur a bien été changé";
                $this->flash('success_change_password', $message);
                return $this->redirect($this->view('/admin/utilisateur/' . $id_utilisateur . '/edit'));
            }
            $this->flash('error_change_password', $error);
            return $this->redirect($this->view('/admin/utilisateur/' . $id_utilisateur . '/edit'));

        }
        return $this->redirect($this->view('/admin/utilisateur'));
    }

    public function lock($id)
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }
        $user = $this->t_utilisateurs->find(array('id_utilisateur' => $id));
        if (($user !== null) && ($this->session()->get_user_id() !== $id)) {
            if ($user->utiDesactive) {
                $this->t_utilisateurs->update(array('id_utilisateur' => $id), array(
                    'utiDesactive' => '0',
                    'utiDateDesactive' => 'NULL',
                ));
            } else {
                $datetime = date('Y-m-d H:i:s');
                $this->t_utilisateurs->update(array('id_utilisateur' => $id), array(
                    'utiDesactive' => '1',
                    'utiDateDesactive' => "'$datetime'",
                ));
            }


        }
        return $this->redirect($this->view('/admin/utilisateur'));
    }
}