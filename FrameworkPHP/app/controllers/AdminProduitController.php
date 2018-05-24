<?php

class AdminProduitController extends Controller
{
    private $t_produits;

    public function init()
    {
        $this->t_produit = new Model('T_PRODUITS');
    }

    public function index()
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }

        $produits = $this->t_produit->findAll();



        $this->display('adminProduit.index', array(
            'produits' => $produits,
        ));
    }
}