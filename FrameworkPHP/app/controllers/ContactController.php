<?php

class ContactController extends Controller
{
    private $data;
    private $t_relation;

    public function init() {
        $this->data = new ContactModel('T_PRODUITS_UTILISATEURS');
        $this->t_relation = new Model('T_RELATION');
    }

    public function index($id)
    {
        $data = $this->data->findAnnonce($id);

        if ($data) {
            $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
            $message = isset($_POST['message']) ? $_POST['message'] : "";
            $latitude = 0;
            $longitude = 0;

            if ($this->session()->get_user_id()) {
                $pseudo = $this->session()->get_pseudo();
                $email = $this->session()->get_email();
                $phone = $this->session()->get_tel();
                $latitude = $this->session()->get_latitude();
                $longitude = $this->session()->get_longitude();
            }

            return $this->display('contact.index', array(
                "data" => $data,
                "pseudo" => $pseudo,
                "email" => $email,
                "phone" => $phone,
                "message" => $message,
                "latitude" => $latitude,
                "longitude" => $longitude
            ));
        }
        return $this->redirect($this->view('/annonce'));
    }

    public function contacter()
    {
        $error = array();
        $id = $this->input('id');
        $annonceInfo = $this->data->findAnnonce($id);

        $pseudo = $this->input('pseudo');
        $email = $this->input('email');
        $phone = $this->input('phone');
        $message = $this->input('message');
        $quantity = $this->input('quantity');
        $max = $this->input('max');


        if (empty($email)) {
            $error[] = "Vous devez rentrer un email";
        }
        if (empty($quantity)) {
            $error[] = "Vous devez entrer une quantité";
        }
        if (empty($message)) {
            $error[] = "Vous devez entrer un message";
        }
        if ($quantity > $max) {
            $error[] = "Vous ne pouvez échanger une quantité supérieur à celle proposé sur l'annonce.";
        }


        if (count($error) === 0) {
            $array = [
                'relQuantite' => "'$quantity'",
                'relProduit_utilisateur_id' => "'$id'",
            ];
            if ($this->session()->get_user_id()) $array['relAcheteur_id'] = $this->session()->get_user_id();

            $this->t_relation->insert($array);

            $message = "<h1>Demande d'echange !</h1>";
            $message .= "<p>Une personne voudrais faire un échange avec vous.</p>";
            $message .= "<p>Nom : $pseudo</p>";
            $message .= "<p>Demande: $message</p>";
            $message .= "<p><a href='" . $this->view('/');
            $message .= "' target='_blank'>Aller sur le bon potager</a>";

            ini_set("smtp_port", "1025");
            mail($annonceInfo->utiEmail, 'Demande d\'echange sur le bon potager', $message);
            //TODO: a essayer avec MailDev
            $message = "<p>La demande d'échange à bien été envoyer</p>";
            $this->flash('success_annonce', $message);
            return $this->redirect($this->view('/'));
        }


        $this->flash('error', $error);
        $this->flash('email', $email);
        $this->flash('pseudo', $pseudo);
        $this->flash('phone', $phone);
        $this->flash('message', $message);
        $this->flash('quantity', $quantity);

        return $this->redirect($this->view('/contact/' . $id));
    }
}