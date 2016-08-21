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

class QuestionsSkip extends Model
{

    public function getAllQuestionsSkip()
    {
        $sql = "SELECT questions_skip_id, questions_id, user_id, skipped_date, created_date FROM questions_skip";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addQuestionsSkip($questions_id, $user_id, $skipped_date)
    {
        $sql = "INSERT INTO questions_skip (questions_id, user_id, skipped_date) VALUES (:questions_id, :user_id, :skipped_date )";
        $query = $this->db->prepare($sql);
        $parameters = array(':questions_id' => $questions_id, ':user_id' => $user_id, ':skipped_date' => $skipped_date);

        $query->execute($parameters);
    }

    public function deleteQuestionsSkip($questions_skip_id)
    {
        $sql = "DELETE FROM questions_skip WHERE questions_skip_id = :questions_skip_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':questions_skip_id' => $questions_skip_id);

        $query->execute($parameters);
    }

    public function getQuestionsSkip($questions_skip_id)
    {
        $sql = "SELECT questions_skip_id, questions_id, user_id, skipped_date, created_date FROM questions_skip WHERE questions_skip_id = :questions_skip_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':questions_skip_id' => $questions_skip_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateQuestionsSkip($questions_skip_id, $question_id, $user_id, $skipped_date)
    {
        $sql = "UPDATE questions_skip SET question_id = :question_id, user_id = :user_id, skipped_date = :skipped_date WHERE questions_skip_id = :questions_skip_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':questions_skip_id' => $questions_skip_id, ':question_id' => $question_id, ':user_id' => $user_id, ':skipped_date' => $skipped_date);

        $query->execute($parameters);
    }

    public function getAmountOfQuestionsSkip()
    {
        $sql = "SELECT COUNT(questions_skip_id) AS amount_of_questionskip FROM questions_skip";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_questionskip;
    }
}
