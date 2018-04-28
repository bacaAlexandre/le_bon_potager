<?php

class AdminProduitController extends Controller
{
    public function index()
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }
        $this->display('adminProduit.index');
    }
}