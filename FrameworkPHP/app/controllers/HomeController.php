<?php

class HomeController extends Controller
{
    public function index() {
        $this->display('home.index');
    }

    public function edit() {
        $this->display('home.edit');
    }
}