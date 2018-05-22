<?php

class AnnonceController extends Controller
{
    private $t_departement;
    private $t_categorie;
    private $t_produit;
    private $liste;


    public function init()
    {
        $this->t_departement = new Model('T_DEPARTEMENT');
        $this->t_categorie = new Model('T_CATEGORIE');
        $this->t_produit = new Model('T_PRODUITS');
        $this->liste = new AnnonceModel('T_PRODUITS_UTILISATEURS');
    }

    public function index()
    {
        $department = $this->t_departement->findAll();
        $categories = $this->t_categorie->findAll();
        $produits = array();

        foreach ($categories as $categorie)
        {
            $produit = $this->t_produit->select(array(
                'proCategorie_id' => $categorie->id_categorie,
            ));
            $produits[$categorie->catNom] = $produit;
        }

        $this->display('annonce.index', array(
            "produits" => $produits,
            "department" => $department,
        ));
    }

    public function recherche($dep, $produit = null)
    {
        $produits = $this->liste->findAllByDep($dep, $produit);

        if (count($produits) < 1) {
            $this->display('annonce.liste', array("error" => "Aucun resultat trouvé pour cette recherche"));
        } else {
            $this->display('annonce.liste', array("produits" => $produits));
        }
    }
}