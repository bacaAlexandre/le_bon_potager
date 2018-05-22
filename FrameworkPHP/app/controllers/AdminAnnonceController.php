<?php

class AdminAnnonceController extends Controller
{
    private $t_produits_utilisateurs;

    public function init()
    {
        $this->t_produits_utilisateurs = new AnnonceModel('T_PRODUITS_UTILISATEURS');
    }

    public function index()
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }
        $this->display('adminAnnonce.index', array(
            'annonces' => $this->t_produits_utilisateurs->findAll(),
        ));
    }

    public function lock($id) {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }
        $produit_utilisateur = $this->t_produits_utilisateurs->find(array('id_produit_utilisateur' => $id));
        if ($produit_utilisateur !== null) {
            if ($produit_utilisateur->puDesactive) {
                $this->t_produits_utilisateurs->update(array(
                    'id_produit_utilisateur' => $id
                ), array(
                    'puDesactive' => '0',
                    'puDateDesactive' => 'NULL',
                ));
            } else {
                $datetime = date('Y-m-d H:i:s');
                $this->t_produits_utilisateurs->update(array(
                    'id_produit_utilisateur' => $id
                ), array(
                    'puDesactive' => '1',
                    'puDateDesactive' => "'$datetime'",
                ));
            }
        }
        return $this->redirect($this->view('/admin/annonce'));
    }
}