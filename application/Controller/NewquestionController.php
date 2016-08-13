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

class NewquestionController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
      if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        $questions = new Questions();
        if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
          $questiondetail =  htmlspecialchars($_POST["questiondetail"]);
          $user_id = $_SESSION["user_id"];
          $checkedpoll =substr(htmlspecialchars($_POST["optionsRadios"]),7);
          $lastinsertedqid = $questions->addQuestions($user_id, $questiondetail, 1, 1);

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
        }
      }
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/newquestion/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
