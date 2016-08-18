<?php

namespace Mini\Controller;

use Mini\Model\UserType;
use Mini\Model\User;

class LoginController
{
    public function index()
    {
        require APP . 'view/login/index.php';

    }

    public function giris()
    {
        if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
		$email = htmlspecialchars($_POST["email"]);
		$sifre = htmlspecialchars($_POST["password"]);

    	$user = new User();
    	$userVeri = $user->getUserByMailAndPw($email,$sifre);
    	if ($userVeri === false) {
    		echo json_encode(array('Result' => "Hata1"));
            header('location: ' . URL . 'login?hata');
    	}
        else{
            echo json_encode(array('email' => $userVeri->email, 'username' =>  $userVeri->username, $userVeri->active));
            $_SESSION["user_id"] = $userVeri->user_id;
            $_SESSION["email"] =  $userVeri->email;
            $_SESSION["username"] =  $userVeri->username;
            header('location: ' . URL);
        }
        
        }
    }

    public function cikis(){
        session_destroy();
        header('location: ' . URL);
    }

}
