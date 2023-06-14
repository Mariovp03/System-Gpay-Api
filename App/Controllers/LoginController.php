<?php

namespace Controller;

class LoginController extends Controller
{
    public function index(){
        $this->getDataAndValidateLogin();
        $this->getViewLogin();
    }
    
    public function getDataAndValidateLogin(){
        $_SESSION['email'] = 'mario@mario.com';
        $_SESSION['password'] = 'mario123';
        $_SESSION['action'] = '';
        if(!empty($_POST)){
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];
            if($userEmail == $_SESSION['email'] && $userPassword == $_SESSION['password']){
                echo("Conectado");
                $_SESSION['action'] = 'home';
            }
        }
    }

    public function getViewLogin(){
        $pathLoginTreated = PATH_BASE_VIEW . "LoginView.php";
        echo $this->getView(
            $pathLoginTreated ,
            [
                'email' =>  $_SESSION['email'],
                'password' => $_SESSION['password'],
                'action' => $_SESSION['action']
            ] 
        );
    }
}
?>