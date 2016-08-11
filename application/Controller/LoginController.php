<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\UserType;
use Mini\Model\User;

class LoginController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        require APP . 'view/login/index.php';

    }

    public function giris()
    {
		$email = htmlspecialchars($_POST["email"]);
		$sifre = htmlspecialchars($_POST["sifre"]);

    	$user = new User();
    	$userVeri = $user->getUserByMailAndPw($email,$sifre);
    	if ($userVeri === false) {
    		echo json_encode(array('Result' => "Hata1"));
    	}
        else{
            echo json_encode(array('email' => $userVeri->email, 'username' =>  $userVeri->username, $userVeri->active));
            $_SESSION["user_id"] = $userVeri->user_id;
            $_SESSION["email"] =  $userVeri->email;
            $_SESSION["username"] =  $userVeri->username;
        }
    }

}
