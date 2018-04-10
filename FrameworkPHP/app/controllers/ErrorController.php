<?php

class ErrorController extends Controller
{

    public function index($code) {
        switch ($code) {

            case 404:
                $this->display('error.404');
                break;
        }
    }
}