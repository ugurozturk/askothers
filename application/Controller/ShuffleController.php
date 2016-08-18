<?php

namespace Mini\Controller;

use Mini\Model\Questions;
use Mini\Model\PollOption;
use Mini\Model\PollOptionVotes;
use Mini\Model\User;
use Mini\Model\Points;

class ShuffleController
{
    public function index()
    {
        if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];

        $questions = new Questions();


        if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
           $secilenopiton = htmlspecialchars($_POST["optionsRadios"]);
           $pollOptionVotes = new PollOptionVotes();
           
           $pollOptionVotes->addPollOptionVotes(substr($secilenopiton, 1), $user_id);

           $points = new Points();
           $point = $points->getPointsFromDetail("Başkasının sorusunu oyladı");
           $user = new User();
           $user->puanEkleUser($user_id,$point->point_value);
           $point = $points->getPointsFromDetail("Başkası bir sorunu oyladı");
           
           $pollOptionforqp = new PollOption();
           $cevaplananquestion = $pollOptionforqp->getPollOption(substr($secilenopiton, 1));
           $questions->puanEkleQuestion($cevaplananquestion->question_id, $point->point_value);
           $qu = $questions->getQuestions($cevaplananquestion->question_id);
           $user->puanEkleUser($qu->user_id, $point->point_value);
        }

    	

        //if($userid === null) { $userid = 2; } //Kontrol Et
    	$questionsVeriler = $questions->getTreeQuestionsExpectIVoted($user_id);
        if ($questionsVeriler) {
        shuffle($questionsVeriler);
        $question = $questionsVeriler[0];//Böyle bir şey vardı. Arrayden sadece 1 değer gelsin.
        header('location:' . URL . 'shuffle/q/' . $question->question_id);


        //$pollOption = new PollOption();
        //$questionPollOptions = $pollOption->getAllPollOptionByQuestion($question->question_id);
        
        }
      }
      $radioBtnGoster = true;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/shuffle/index.php';
        require APP . 'view/_templates/footer.php';

    }

    public function q($q_id){
        $questions = new Questions();
        $question = $questions->getQuestions($q_id);

        $pollOption = new PollOption();
        $questionPollOptions = $pollOption->getAllPollOptionByQuestion($question->question_id);

        $radioBtnGoster = true;

        if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
            $user_id = $_SESSION["user_id"];
            $hasVoted = $questions->checkQuestionVoted($question->question_id, $user_id);

            if($hasVoted){
                $radioBtnGoster = false;
            }
        }
        if(isset($_GET["sonucgoster"])){
        $sonusgoster = htmlspecialchars($_GET["sonucgoster"]);

            if ($sonusgoster == "t") {
                $radioBtnGoster = false;
            }
        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/shuffle/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
