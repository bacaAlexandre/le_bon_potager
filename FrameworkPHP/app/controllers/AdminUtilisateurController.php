<?php

class AdminUtilisateurController extends Controller
{
    private $t_utilisateurs;
    private $t_code_postal;

    public function __construct()
    {
        parent::__construct();
        $this->t_utilisateurs = new Model('T_UTILISATEURS');
        $this->t_code_postal = new Model('T_CODE_POSTAL');
    }

    public function index()
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect('AccueilController@index');
        }
        $users = $this->t_utilisateurs->findAll();
        $this->display('adminUtilisateur.index', array(
            'users' => $users,
        ));
    }

    public function edit($id)
    {



        $this->display('adminUtilisateur.edit');
    }

    public function lock($id) {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect('AccueilController@index');
        }
        $user = $this->t_utilisateurs->find(array('id_utilisateur', $id));
        if (($user !== null) && ($this->session()->get_user_id() !== $id)) {
            $this->t_utilisateurs->update(array('id_utilisateur' => $id), array(
                'utiDesactive' => 'NOT `utiDesactive`',
            ));
        }
        return $this->redirect('AdminUtilisateurController@index');
    }
}