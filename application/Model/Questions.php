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
        $sql = "SELECT questions_id, user_id, questions_detail, language_id, active, created_date FROM questions";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addQuestions($user_id, $questions_detail, $language_id, $active, $created_date)
    {
        $sql = "INSERT INTO questions (user_id,questions_detail,language_id,active,created_date) VALUES (:user_id, :questions_detail, :language_id, :active, :created_date)";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id, ':questions_detail' => $questions_detail, ':language_id' => $language_id, ':active' => $active, ':created_date' => $created_date);

        $query->execute($parameters);
    }

    public function deleteQuestions($questions_id)
    {
        $sql = "DELETE FROM questions WHERE questions_id = :questions_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':questions_id' => $questions_id);

        $query->execute($parameters);
    }

    public function getQuestions($questions_id)
    {
        $sql = "SELECT questions_id, user_id, questions_detail, language_id, active, created_date FROM questions WHERE questions_id = :questions_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':questions_id' => $questions_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateQuestions($questions_id, $user_id, $questions_detail, $language_id, $active, $created_date)
    {
        $sql = "UPDATE questions SET user_id = :user_id, questions_detail = :questions_detail, language_id = :language_id, active = :active, created_date = :created_date WHERE questions_id = :questions_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':questions_id' => $questions_id, ':user_id' => $user_id, ':questions_detail' => $questions_detail, ':language_id' => $language_id, ':active' => $active, ':created_date' => $created_date);

        $query->execute($parameters);
    }

    public function getAmountOfQuestions()
    {
        $sql = "SELECT COUNT(questions_id) AS amount_of_questions FROM questions";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_questions;
    }
}
