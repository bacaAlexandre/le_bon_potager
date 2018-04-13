<?php

class AnnonceController extends Controller
{
    public function index()
    {

        $req = new Model('T_DEPARTEMENT');
        $department = $req->findAll();

        $req = new AnnonceModel('T_PRODUITS');
        $produits = $req->findProduitCategorie();

        $this->display('annonce.index', array(
            "produits" => $produits,
            "department" => $department,
        ));
    }


    public function recherche()
    {
        // TODO: recupérer la valeur des selecteurs , et l'envoyer a la page reponse pour construire ma liste

        var_dump($_GET);
        var_dump($_POST);
        $this->display('annonce.liste', ['id' => 76]);

    }
}