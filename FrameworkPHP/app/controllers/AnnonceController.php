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

    public function recherchePost()
    {
        if (!isset($_POST['dep'])) {

            $this->flash('error', "Selectionner un département");
            $this->flash('product', isset($_POST['product']) ? $_POST['product'] : "");

            return $this->redirect('AnnonceController@index');
        }


        $this->recherche($_POST['dep'], isset($_POST['product']) ? $_POST['product'] : null);
    }

    public function rechercheGet($dep)
    {

        $this->recherche($dep, null);
    }

    private function recherche($dep, $produit)
    {
        $produits = $this->liste->findListeProduitDep($produit, $dep);

        if (count($produits) < 1) {
            $this->display('annonce.liste', array("error" => "Aucun resultat trouvé pour cette recherche"));
        } else {
            $this->display('annonce.liste', array("produits" => $produits));
        }


    }
}