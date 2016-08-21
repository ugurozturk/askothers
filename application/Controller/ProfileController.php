<?php

namespace Mini\Controller;

use Mini\Model\User;
use Mini\Model\UserType;
use Mini\Model\UserActivate;
use Mini\Model\Questions;
use Mini\Model\Log;


class ProfileController
{
    public function index()
    {
        if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
        $userClass = new User();
        $user = $userClass->GetUser($user_id);
        }

         $showSendQuestionBtn = true;

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/index.php';
        require APP . 'view/_templates/footer.php';

    }

    public function u($username){
        $userClass = new User();
        $user = $userClass->getUserFromUsername($username);
        
        $showSendQuestionBtn = false;

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

    public function userVotedList(){
    	if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
        $questionClass = new Questions();
        $questions = $questionClass->getAllUserVotedQuestions($user_id);
        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/userVotedList.php';
        require APP . 'view/_templates/footer.php';
    }

    public function activate($d){
        //username-key şeklinde geliyor.
        $username = substr($d,0,strrpos($d,"-"));
        $activate_code = substr($d,strrpos($d,"-")+1);
        $userModel = new User;
        $user = $userModel->getUserFromUsername($username);

        $useractivateModel = new UserActivate;
        $useractivate = $useractivateModel->getUserActivateByUseridAndCode($user->user_id, $activate_code);
        
        if($useractivate){
            $userModel->updateUserActive($user->user_id);

            $log = new Log;
            $log->addLog(3,$user->user_id);
            $sonuc = "Aktivasyon işleminiz tamamlandı.";
        }
        else{
            $sonuc = "Aktivasyon işleminiz başarısız.";
        }
         // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/profile/activate.php';
        require APP . 'view/_templates/footer.php';
    }
}
