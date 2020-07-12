<?php

class Controller{
    protected $pageData = array();
    private $model;
    private $view;

    public function checkAuth(){
        if (!empty($_SESSION['user'])) {}
        else header("Location: /admin/");
    }

    public function __construct(){
        $this->model = new Model();
        $this->view = new View();
    }
}

?>