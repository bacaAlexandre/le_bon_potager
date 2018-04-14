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
        $data = $this->data->findAnnonce($_POST['id']);

        $pseudo = "";
        $email = "";
        $tel = "";

        if ($this->session()->get_user_id()) {
            $pseudo = $this->session()->get_pseudo();
            $email = $this->session()->get_email();
            $tel = $this->session()->get_tel();
        }

        return $this->display('contact.index', array(
            "data" => $data,
            "pseudo" => $pseudo,
            "email" => $email,
            "tel" => $tel,
        ));
    }

    public function contacter()
    {

    }
}