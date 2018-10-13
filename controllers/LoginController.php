<?php 
namespace controllers;
use models\User;
class LoginController{
    public function dologin(){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $user = new User;
        if($user->login($username,$password)){
            
            die(view("users/index"));
        }else{
            die("登录失败！");
        }
   
    }
    public function login(){
        view("users/login");
    }
    public function doregister(){
        
        view("users/login");
    }
    public function register(){

        view("users/register");
    }
}