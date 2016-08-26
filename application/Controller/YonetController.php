<?php

namespace Mini\Controller;

use Mini\Model\User;
use Mini\Model\Questions;
use Mini\Model\PollOptionVotes;

class YonetController
{
    public function index()
    {
        if(isset($_SESSION["user_typeid"]) && $_SESSION["user_typeid"] == "1"){
        $user = new User;
        $kullaniciSayisi = $user->getAmountOfUser();
        $kullaniciSayisiBugun = $user->getAmountOfUserLast24h();

        $questions = new Questions;
        $soruSayisi = $questions->getAmountOfQuestions();
        $soruSayisiBugun = $questions->getAmountOfQuestionsLast24h();

        $pollVotes = new PollOptionVotes;
        $cevapSayisi = $pollVotes->getAmountOfPollOptionVotes();
        $cevapSayisiBugun = $pollVotes->getAmountOfPollOptionVotesLast24h();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/yonet/index.php';
        require APP . 'view/_templates/footer.php';
        }
    }

    public function sorular(){
        if(isset($_SESSION["user_typeid"]) && $_SESSION["user_typeid"] == "1"){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/yonet/sorular.php';
        require APP . 'view/_templates/footer.php';
        }
    }

    public function getAllSorular()
    {
        if(isset($_SESSION["user_typeid"]) && $_SESSION["user_typeid"] == "1"){
        $questionsModel = new Questions;
        $questionData = json_encode( $questionsModel->getAllQuestions());
        echo $questionData;
        }
    }

    public function getQuestion(){
         $adres = URL;
       if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $adres) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'  && isset($_POST["questionid"]))
       {
            $questionid = htmlspecialchars($_POST["questionid"]);
            $questionModel = new Questions;
            $questionData = json_encode( $questionModel->getQuestions($questionid));
            echo $questionData;
       }
    }

    public function silQuestion(){
        if(isset($_SESSION["user_typeid"]) && $_SESSION["user_typeid"] == "1"){
        $adres = URL;
       if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $adres) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'  && isset($_POST["questionid"]))
       {
           $questionid = $_POST["questionid"];

           $questionModel = new Questions;
           $questionModel->deleteQuestions($questionid);

           echo json_encode("OK");
       }
     }
    }

    public function updateQuestion(){
        $adres = URL;
       if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $adres) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'  && isset($_POST["questionid"]))
       {
            $questionid = htmlspecialchars($_POST["questionid"]);
            $user_id = htmlspecialchars($_POST["user_id"]);
            $question_detail = htmlspecialchars($_POST["question_detail"]);
            $language_id = htmlspecialchars($_POST["language_id"]);
            $points = htmlspecialchars($_POST["points"]);
            $active = htmlspecialchars($_POST["active"]);

            $questionModel = new Questions;
            $questionModel->updateQuestions($questionid, $user_id, $question_detail, $language_id, $points, $active);


            echo json_encode(array(
                "questionid" => $questionid,
                "user_id" => $user_id,
                "question_detail" => $question_detail,
                "language_id" => $language_id,
                "points" => $points,
                "active" => $active
            ));
       }
       
    }

    public function kullanicilar(){
        if(isset($_SESSION["user_typeid"]) && $_SESSION["user_typeid"] == "1"){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/yonet/kullanicilar.php';
        require APP . 'view/_templates/footer.php';
        }
    }

    public function getAllUser()
    {
        if(isset($_SESSION["user_typeid"]) && $_SESSION["user_typeid"] == "1"){
        $userModel = new User;
        $userData = json_encode( $userModel->getAllUser());
        echo $userData;
        }
    }

    public function getUser(){
         $adres = URL;
       if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $adres) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'  && isset($_POST["userid"]))
       {
            $userid = htmlspecialchars($_POST["userid"]);
            $userModel = new User;
            $userData = json_encode( $userModel->getUser($userid));
            echo $userData;
       }
    }

    public function updateUser(){
        $adres = URL;
       if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $adres) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'  && isset($_POST["userid"]))
       {
            $userid = htmlspecialchars($_POST["userid"]);
            $username = htmlspecialchars($_POST["username"]);
            $password = md5(htmlspecialchars($_POST["password"]));
            $email = htmlspecialchars($_POST["email"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $aktif = htmlspecialchars($_POST["aktif"]);
            $points = htmlspecialchars($_POST["points"]);

            $userModel = new User;
            $userModel->updateUser($userid, $points, $username, $password, $email, $phone, $aktif);


            echo json_encode(array(
                "username" => $username,
                "password" => $password,
                "email" => $email,
                "phone" => $phone,
                "aktif" => $aktif,
                "points" => $points
            ));
       }
       
    }

    public function silUser(){
         if(isset($_SESSION["user_typeid"]) && $_SESSION["user_typeid"] == "1"){
        $adres = URL;
       if (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $adres) && strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'  && isset($_POST["userid"]))
       {
           $userid = $_POST["userid"];

           $userModel = new User;
           $userModel->deleteUser($userid);

           echo json_encode("OK");
       }
    }
    }

}
