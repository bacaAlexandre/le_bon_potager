<?php

class AdminAnnonceController extends Controller
{
    private $t_produits_utilisateurs;

    public function __construct()
    {
        parent::__construct();
        $this->t_produits_utilisateurs = new AnnonceModel('T_PRODUITS_UTILISATEURS');
    }

    public function index()
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect('AccueilController@index');
        }
        $this->display('adminAnnonce.index', array(
            'annonces' => $this->t_produits_utilisateurs->findAll(),
        ));
    }
}