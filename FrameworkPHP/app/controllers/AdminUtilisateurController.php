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
        $id_utilisateur = $_POST['id'];
        $error = array();
        $reponse = array();
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }
        $user = $this->t_utilisateurs->find(array('id_utilisateur' => $id_utilisateur));

        if (($user !== null) && ($this->session()->get_user_id() !== $id_utilisateur)) {
            $adresse = $_POST['address'];
            $adresse_affiche = ($_POST['address_visible']) == "true" ? 1 : 0;
            $code_postal = $_POST['postal_code'];
            $tel = $_POST['tel'];
            $tel_affiche = ($_POST['tel_visible']) == "true" ? 1 : 0;
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $description = $_POST['biography'];
            $password = $_POST['password'];

            if (empty($email)) {
                $data["input"] = "email";
                $data["message"] = "Vous devez rentrer un email";
                $error[] = $data;
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data["input"] = "email";
                $data["message"] = "Vous devez rentrer un email valide";
                $error[] = $data;
            } else {
                $other = $this->t_utilisateurs->find(array('utiEmail' => "'$email'"));
                if (($other) && ($other->id_utilisateur != $id_utilisateur)) {
                    $data["input"] = "email";
                    $data["message"] = "Cette adresse email est déjà utilisée";
                    $error[] = $data;
                }
            }
            if (empty($pseudo)) {
                $data["input"] = "pseudo";
                $data["message"] = "Vous devez entrer un pseudo";
                $error[] = $data;
            }
            if (empty($adresse)) {
                $data["input"] = "adress";
                $data["message"] = "Vous devez entrer une adresse";
                $error[] = $data;

            }
            if (empty($code_postal)) {
                $data["input"] = "postal_code";
                $data["message"] = "Vous devez entrer un code postal";
                $error[] = $data;
            }
            if (!empty($password)) {
                if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d-+_]{8,}$/", $password)) {
                    $data["input"] = "password";
                    $data["message"] = "Le mot de passe doit contenir au minimum 8 caractères, une miniscule, une majuscule et un chiffre.";
                    $error[] = $data;
                }
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
                if (!empty($password)) {
                    $this->t_utilisateurs->update(array(
                        'id_utilisateur' => $id_utilisateur,
                    ), array(
                        'utiMdp' => "sha1('$password')",
                    ));


                    $message = "<p>Votre mot de passe a ete change par un administrateur.</p>";
                    $message .= "<p>Votre nouveau mot de passe: <span style='color:blue'>$password</span></p>";

                    ini_set("smtp_port", "1025");
                    mail($user->utiEmail, 'Changement de mot passe', $message);
                }
                $reponse['message'] = "OK";
            } else {
                $reponse['message'] = "KO";
                $reponse['error'] = $error;
            }
        }
        echo json_encode($reponse);
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