<?php

namespace Mini\Controller;

use Mini\Model\User;
use Mini\Model\Questions;
use Mini\Model\PollOptionVotes;

class HomeController
{
    public function index()
    {
        $questions = new Questions;
        $soruSayisi = $questions->getAmountOfQuestions();
        $soruSayisiBugun = $questions->getAmountOfQuestionsLast24h();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';

    }

    public function sartlar(){
        require APP . 'view/home/sartlar.php';
    }

    public function learn(){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/learn.php';
        require APP . 'view/_templates/footer.php';
    }
}
