<?php

class Auth extends Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->view->render('Customer/Dash');
    }

    function login($type="Customer"){
        $this->view->render('login',array("type"=>$type));
    }

    function checklogin($type="Customer"){
        if($this->model->validateLogIn($type,$_POST['email'],$_POST["password"])){
            $_SESSION['user'] = array("email"=>$_POST['email'],"type"=>$type);
            header("Location:".BASE_DIR.$type);
            die();
        }else{
            $_SESSION['msg'] = "Wrong Username or password";
            header("Location:".BASE_DIR.'Auth/login/'.$type);
            die();            
        }
    }

    function logout(){
        unset( $_SESSION['user']);
        header("Location:".BASE_DIR);
        die();
    }

}








?>