<?php

namespace Mini\Controller;

use Mini\Model\UserType;
use Mini\Model\User;

class RegisterController
{
    public function index()
    {
        require APP . 'view/register/index.php';
    }

    public function kayit(){
    	if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
    		$username = htmlspecialchars($_POST["username"]);
			$email = htmlspecialchars($_POST["email"]);
			$password = htmlspecialchars($_POST["password"]);

			$user = new User();
			$user->addUser(3, 0, $username, $password, $email, 0, 1);

    	}
    	header('location:' . URL);
    }
}
