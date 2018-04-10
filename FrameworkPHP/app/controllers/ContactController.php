<?php

class ContactController extends Controller
{
    public function index() {
        $this->display('contact.index');
    }

    public function edit($id) {
        $this->display('contact.edit', ['id' => $id]);
    }
}