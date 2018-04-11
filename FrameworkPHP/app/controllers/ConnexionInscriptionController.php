<?php

class ConnexionInscriptionController extends Controller
{
    public function index()
    {
        $this->display('connexion.index');
    }

    public function connexion()
    {
        var_dump($_POST);
    }

}