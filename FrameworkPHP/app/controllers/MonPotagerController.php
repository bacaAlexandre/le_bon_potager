<?php

class MonPotagerController extends Controller
{
    private $t_produits;
    private $t_categorie;
    private $t_unite;
    private $t_produits_utilisateurs;

    public function init()
    {
        $this->t_produits = new Model('T_PRODUITS');
        $this->t_categorie = new Model('T_CATEGORIE');
        $this->t_unite = new Model('T_UNITE');
        $this->t_produits_utilisateurs = new Model('T_PRODUITS_UTILISATEURS');
    }

    public function index()
    {
        if (!$this->session()->is_logged()) {
            return $this->redirect($this->view('/connexion'));
        }
        $produits = array();

        $res = $this->t_categorie->findAll();
        foreach ($res as $categorie) {
            $res = $this->t_produits->select(array(
                'proCategorie_id' => $categorie->id_categorie,
            ));
            foreach ($res as $produit) {
                $produits[$categorie->catNom][] = $produit;
            }
        }
        $unites = $this->t_unite->findAll();
        $this->display('potager.index', array('produits' => $produits, 'unites' => $unites));
    }

    public function store() {
        $error = array();
        $user_id = $this->session()->get_user_id();
        $produit = $this->input('product');
        $quantite = $this->input('quantity');
        $unite = $this->input('unity');
        $commentaire = $this->input('info');

        if (empty($produit)) {
            $error[] = "Vous devez choisir un produit";
        }
        if (empty($quantite)) {
            $error[] = "Vous devez entrer une quantité";
        } elseif (!preg_match('/^[0-9]+(\.[0-9]+)?$/', $quantite)) {
            $error[] = "Vous devez entrer une quantité";
        }
        if (empty($unite)) {
            $error[] = "Vous devez choisir une unité";
        }

        if (count($error) === 0) {
            $this->t_produits_utilisateurs->insert([
                'puVendeur_id' => "'$user_id'",
                'puProduit_id' => "'$produit'",
                'puCommentaire' => (empty($commentaire) ? 'NULL' : "'$commentaire'"),
                'puQuantite' => "'$quantite'",
                'puUnite_id' => "'$unite'",
            ]);

            $message = "Votre produit a bien été ajouté";
            $this->flash('success_creation', $message);
            return $this->redirect($this->view('/potager'));
        }
        $this->flash('error_creation', $error);
        $this->flash('produit_creation', $produit);
        $this->flash('commentaire_creation', $commentaire);
        $this->flash('quantite_creation', $quantite);
        $this->flash('unite_creation', $unite);
        return $this->redirect($this->view('/potager'));
    }
}