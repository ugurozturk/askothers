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
        $adres = URL;
       if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $adres) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'  && isset($_POST["email"]) && isset($_POST["password"])){
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
