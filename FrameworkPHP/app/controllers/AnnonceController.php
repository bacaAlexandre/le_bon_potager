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
        $this->t_produitCategorie = new AnnonceModel('T_PRODUITS');
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


    public function recherche($dep = null)
    {
        // TODO: recupérer la valeur des selecteurs , et l'envoyer a la page reponse pour construire ma liste

        if ($dep == null) $dep = $_POST['dep'];
        if (isset($_POST['product'])) $cat = $_POST['product'];
        $produit = (isset($_POST['product']) ? $_POST['product'] : null);

        if ($dep == null) {
            //TODO erreur aucun champs selectionner !!!!!!
        }

        $produits = $this->liste->findListeProduitDep($produit, $dep);

        $this->display('annonce.liste', array("produits" => $produits));

    }
}