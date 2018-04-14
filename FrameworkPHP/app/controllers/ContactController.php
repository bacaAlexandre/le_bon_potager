<?php

class ContactController extends Controller
{

    public function index()
    {
        $pseudo = "";
        $email = "";
        $tel = "";

        if ($this->session()->get_user_id()) {
            $pseudo = $this->session()->get_pseudo();
            $email = $this->session()->get_email();
            $tel = $this->session()->get_tel();
        }

        return $this->display('contact.index', array(
            "pseudo" => $pseudo,
            "email" => $email,
            "tel" => $tel,
        ));
    }

}