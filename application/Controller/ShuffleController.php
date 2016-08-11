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

use Mini\Model\Questions;
use Mini\Model\PollOption;
use Mini\Model\PollOptionVotes;

class ShuffleController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
        if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
           $secilenopiton = htmlspecialchars($_POST["optionsRadios"]);
           $pollOptionVotes = new PollOptionVotes();
           
           $pollOptionVotes->addPollOptionVotes(substr($secilenopiton, 1), $user_id);
        }

    	$questions = new Questions();

        //if($userid === null) { $userid = 2; } //Kontrol Et
    	$questionsVeriler = $questions->getTreeQuestionsExpectIVoted($user_id);
        if ($questionsVeriler) {
        shuffle($questionsVeriler);
        $question = $questionsVeriler[0];//Böyle bir şey vardı. Arrayden sadece 1 değer gelsin.
        $pollOption = new PollOption();
        $questionPollOptions = $pollOption->getAllPollOptionByQuestion($question->question_id);
        
        }
    }
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
        


        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/shuffle/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
