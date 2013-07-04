<?php

class LoginController extends AdminController
{
    public $errors = [];

    public function __construct()
    {
        //Override the auth check
    }

    public function getIndex()
    {
        $this->layout->content = View::make('admin.global.login')->with('errors', $this->errors);
    }
}