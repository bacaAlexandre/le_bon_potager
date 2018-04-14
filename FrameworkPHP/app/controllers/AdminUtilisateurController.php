<?php

class AdminUtilisateurController extends Controller
{
    public function index()
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect('AccueilController@index');
        }
        $this->display('adminUtilisateur.index');
    }

    public function edit($id)
    {
        var_dump($id);
        $this->display('adminUtilisateur.edit');
    }
}