<?php

namespace Mini\Controller;

use Mini\Model\Questions;
use Mini\Model\PollOption;
use Mini\Model\PollOptionVotes;
use Mini\Model\Points;
use Mini\Model\User;

class NewquestionController
{
    public function index()
    {
      if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        $questions = new Questions();
        if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
          $questiondetail =  htmlspecialchars($_POST["questiondetail"]);
          $user_id = $_SESSION["user_id"];
          $userModel = new User;
          $checkedpoll =substr(htmlspecialchars($_POST["optionsRadios"]),7);
          if($questiondetail != "" && strlen($questiondetail) > 5){
            $user = $userModel->getUser($user_id);
            $lastinsertedqid = $questions->addQuestions($user_id, $questiondetail, 1, $user->points, 1);

            $polloption = new PollOption();
            foreach ($_POST["anketsorusu"] as $key => $value) {
              if($value != ""){
              $lastinsertedpid = $polloption->addPollOption($lastinsertedqid, $value, 1);
                if ($checkedpoll-1 === $key) {
                  $polloptionvotes = new PollOptionVotes();
                  $polloptionvotes->addPollOptionVotes($lastinsertedpid, $user_id);
                }
              }
            }
            $points = new Points();
            $point = $points->getPointsFromDetail("Soru Gönderdi");
            $userModel->puanEkleUser($user_id, $point->point_value);
          }
          else {
            echo "Soru başlığı yeterli uzunlukta değil";
          }
        }
      }
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/newquestion/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function learn(){
      // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/learn.php';
        require APP . 'view/_templates/footer.php';
    }
}
