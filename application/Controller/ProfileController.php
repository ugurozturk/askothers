<?php

namespace Mini\Controller;

use Mini\Model\User;
use Mini\Model\UserType;
use Mini\Model\Questions;

class ProfileController
{
    public function index()
    {
        if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
        $userClass = new User();
        $user = $userClass->GetUser($user_id);
        }
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/index.php';
        require APP . 'view/_templates/footer.php';

    }

    public function u($username){
        $userClass = new User();
        $user = $userClass->getUserFromUsername($username);
        
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function userQuestionsList(){
    	if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
        $questionClass = new Questions();
        $questions = $questionClass->getAllUserQuestions($user_id);
        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/userQuestionList.php';
        require APP . 'view/_templates/footer.php';
    }
}
