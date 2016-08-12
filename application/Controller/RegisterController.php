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

class RegisterController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
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
