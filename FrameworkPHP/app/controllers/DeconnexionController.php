<?php


class DeconnexionController extends Controller
{

    public function index()
    {

        $this->session()->logout();

        return $this->redirect('AccueilController@index');

    }
}