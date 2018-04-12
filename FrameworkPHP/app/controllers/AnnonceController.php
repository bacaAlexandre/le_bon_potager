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

    }
}