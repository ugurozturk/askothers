<?php

namespace Mini\Controller;

use Mini\Model\Questions;

class SearchController
{
    public function index()
    {
        header('location:' . URL);

    }

    public function s(){
        if($_GET["araTxt"]){
        $arnaanveri = htmlspecialchars($_GET["araTxt"]);

        $questionClass = new Questions();
        $questions = $questionClass->getQuestionsBySearch($arnaanveri);
        
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/search/index.php';
        require APP . 'view/_templates/footer.php';
        }else{
            header("location:" . URL);
        }
    }
}
