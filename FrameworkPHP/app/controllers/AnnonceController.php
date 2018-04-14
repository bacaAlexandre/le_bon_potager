<?php

class AnnonceController extends Controller
{
    private $t_departement;
    private $t_produitCategorie;
    private $liste;

    public function __construct()
    {
        parent::__construct();
        $this->t_departement = new Model('T_DEPARTEMENT');
        $this->t_produitCategorie = new ProduitModel('T_PRODUITS');
        $this->liste = new AnnonceModel('T_PRODUITS_UTILISATEURS');

    }

    public function index()
    {
        $department = $this->t_departement->findAll();
        $produits = $this->t_produitCategorie->findProduitCategorie();


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