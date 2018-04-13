<?php

class ContactController extends Controller
{

    public function index()
    {

//       var_dump($this->session()->get_user_id());


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