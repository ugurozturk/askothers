<?php

/**
 * Class Songs
 * This is a demo Model class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Model;

use Mini\Core\Model;

class Questions extends Model
{
    public function getAllQuestions()
    {
        $sql = "SELECT question_id, user_id, question_detail, language_id, points, active, created_date FROM questions";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getAllUserQuestions($user_id)
    {
        $sql = "SELECT q.question_id, q.question_detail, Count(pov.poll_option_id) as cevapsayisi
                FROM questions as q
                INNER JOIN poll_option as po on q.question_id = po.question_id
                INNER JOIN poll_option_votes as pov on po.poll_option_id = pov.poll_option_id
                WHERE q.user_id = :user_id
                Group BY po.question_id
                Order BY q.created_date DESC";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getQuestions($question_id)
    {
        $sql = "SELECT question_id, user_id, question_detail, language_id, points, active, created_date FROM questions WHERE question_id = :question_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':question_id' => $question_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getQuestionsTop5()
    {
        $sql = "SELECT question_id, user_id, question_detail, language_id, points, active, created_date FROM questions WHERE points != 0 Order By points DESC LIMIT 5";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getTreeQuestionsExpectIVoted($user_id)
    {
        $sql = "SELECT question_id, user_id, question_detail, language_id, active, created_date
                FROM questions
                WHERE question_id not in (
                SELECT q.question_id
                FROM questions as q
                INNER JOIN poll_option as po on q.question_id = po.question_id
                INNER JOIN poll_option_votes AS pov on po.poll_option_id = pov.poll_option_id
                WHERE pov.user_id = :user_id) Order By points DESC LIMIT 3";
        $query = $this->db->prepare($sql);
         $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function addQuestions($user_id, $question_detail, $language_id, $active)
    {
        $sql = "INSERT INTO questions (user_id,question_detail,language_id,active) VALUES (:user_id, :question_detail, :language_id, :active)";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id, ':question_detail' => $question_detail, ':language_id' => $language_id, ':active' => $active);

        $query->execute($parameters);
        return $this->db->lastInsertId();
    }

    public function deleteQuestions($question_id)
    {
        $sql = "DELETE FROM questions WHERE question_id = :question_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':question_id' => $question_id);

        $query->execute($parameters);
    }

    public function updateQuestions($question_id, $user_id, $question_detail, $language_id, $points, $active, $created_date)
    {
        $sql = "UPDATE questions SET user_id = :user_id, question_detail = :question_detail, language_id = :language_id, points = :points, active = :active, created_date = :created_date WHERE question_id = :question_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':question_id' => $question_id, ':user_id' => $user_id, ':question_detail' => $question_detail, ':language_id' => $language_id, ':points' => $points, ':active' => $active, ':created_date' => $created_date);

        $query->execute($parameters);
    }

    public function puanEkleQuestion($question_id, $points)
    {
        $sql = "UPDATE questions SET points = points + :points WHERE question_id = :question_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':question_id' => $question_id, ':points' => $points);

        $query->execute($parameters);
    }

    public function getAmountOfQuestions()
    {
        $sql = "SELECT COUNT(question_id) AS amount_of_questions FROM questions";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_questions;
    }
    public function getAmountOfQuestionsLast24h()
    {
        $sql = "SELECT COUNT(question_id) AS amount_of_questions FROM questions WHERE created_date >= CURDATE() - INTERVAL 1 DAY";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_questions;
    }

    public function checkQuestionVoted($question_id, $user_id){
        $sql = "SELECT pov.poll_option_vote_id FROM poll_option_votes AS pov WHERE pov.poll_option_id = ANY ( Select po.poll_option_id FROM poll_option AS po WHERE po.question_id = :question_id ) AND pov.user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':question_id' => $question_id, ':user_id' => $user_id);
        $query->execute($parameters);

        $veri = $query->fetch();

        if (empty($veri)) {
            return false;
        }
        else{
            return true;
        }
    }
}
