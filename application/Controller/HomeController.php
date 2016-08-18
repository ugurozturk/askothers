<?php

namespace Mini\Controller;

use Mini\Model\UserType;

class HomeController
{
    public function index()
    {
        $usertype = new UserType();
        $usertype_veriler = $usertype->getAllUserType();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';

    }
}
