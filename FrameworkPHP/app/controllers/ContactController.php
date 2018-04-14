<?php

class ContactController extends Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = new ContactModel('T_PRODUITS_UTILISATEURS');

    }

    public function index()
    {
        var_dump($_POST);
        $data = $this->data->findAnnonce($_POST['id']);

        $pseudo = isset($_POST['pseudo'])? $_POST['pseudo']:"";
        $email = isset($_POST['email'])? $_POST['email']:"";
        $phone = isset($_POST['phone'])? $_POST['phone']:"";
        $message = isset($_POST['message'])? $_POST['message']:"";

        if ($this->session()->get_user_id()) {
            $pseudo = $this->session()->get_pseudo();
            $email = $this->session()->get_email();
            $phone = $this->session()->get_tel();
        }

        return $this->display('contact.index', array(
            "data" => $data,
            "pseudo" => $pseudo,
            "email" => $email,
            "phone" => $phone,
            "message" => $message,
        ));
    }

    public function contacter()
    {
        $error = array();
        $pseudo = $this->input('pseudo');
        $email = $this->input('email');
        $phone = $this->input('phone');
        $message = $this->input('message');
        $qté = $this->input('qté');
        $max = $this->input('max');

        if (empty($email)) {
            $error[] = "Vous devez rentrer un email";
        }
        if (empty($qté)) {
            $error[] = "Vous devez entrer une quantité";
        }
        if (empty($message)) {
            $error[] = "Vous devez entrer un message";
        }

        $this->flash('error', $error);
        $this->flash('email', $email);
        $this->flash('pseudo', $pseudo);
        $this->flash('phone', $phone);
        $this->flash('message', $message);
        var_dump('truc');

        return $this->redirect('ContactController@index');
    }
}