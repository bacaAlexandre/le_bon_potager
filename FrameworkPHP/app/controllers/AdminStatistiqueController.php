<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 23/05/2018
 * Time: 14:33
 */

class AdminStatistiqueController extends Controller
{
    private $t_produit_utilisateur;

    public function init()
    {
        $this->t_produit_utilisateur = new AdminStatistiqueModel('T_PRODUITS_UTILISATEURS');
    }


    public function index()
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }

        $this->display('adminStatistique.index', array());
    }


    public function data()
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }


        $reponse = $this->t_produit_utilisateur->findAllAnnonce();
        echo json_encode($reponse);
    }

}