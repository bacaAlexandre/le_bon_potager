<?php

class ContactController extends Controller
{

    public function index()
    {
        return $this->display('contact.index');
    }

    public function edit()
    {

    }

    public function store()
    {
        $nickname = $_POST['nickname'];
        //TODO
        return $this->redirect('AccueilController@index');
    }
}