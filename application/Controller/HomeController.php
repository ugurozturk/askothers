<?php

namespace Mini\Controller;

use Mini\Model\User;
use Mini\Model\Questions;
use Mini\Model\PollOptionVotes;

class HomeController
{
    public function index()
    {
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
