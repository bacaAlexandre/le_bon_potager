<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 23/05/2018
 * Time: 14:33
 */

class AdminStatistiqueController extends Controller
{
    public function index()
    {
        if ((!$this->session()->is_logged()) || ($this->session()->get_role() !== 'Admin')) {
            return $this->redirect($this->view('/'));
        }

        $this->display('adminStatistique.index', array());
    }

}