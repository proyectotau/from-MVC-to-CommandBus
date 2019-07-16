<?php

namespace Controller;

class Users {

    protected $view;
    protected $model;

    public function __construct($view, $model)
    {
        $this->view = $view;
        $this->model = $model;
    }

    public function index(){
        $users = $this->model->all();
        $this->view->render($users);
    }

    public function show($id){
        $user = $this->model->find($id);
        $this->view->render($user);
    }
}