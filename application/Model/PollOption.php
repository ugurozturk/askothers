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

class PollOption extends Model
{
    public function getAllPollOption()
    {
        $sql = "SELECT poll_option_id, question_id, active, created_date FROM poll_option";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addPollOption($question_id, $active)
    {
        $sql = "INSERT INTO poll_option (question_id, active) VALUES (:question_id, :active)";
        $query = $this->db->prepare($sql);
        $parameters = array(':question_id' => $question_id, ':active' => $active);

        $query->execute($parameters);
    }

    public function deletePollOption($poll_option_id)
    {
        $sql = "DELETE FROM poll_option WHERE poll_option_id = :poll_option_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_id' => $poll_option_id);

        $query->execute($parameters);
    }

    public function getPollOption($poll_option_id)
    {
        $sql = "SELECT poll_option_id, question_id, active, created_date FROM poll_option WHERE poll_option_id = :poll_option_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_id' => $poll_option_id);
        $query->execute($parameters);

        return $query->fetch();
    }
    
    public function updatePollOption($poll_option_id, $question_id, $active)
    {
        $sql = "UPDATE poll_option SET question_id = :question_id, active = :active WHERE poll_option_id = :poll_option_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_id' => $poll_option_id, ':question_id' => $question_id, ':active' => $active);

        $query->execute($parameters);
    }

    public function getAmountOfPollOption()
    {
        $sql = "SELECT COUNT(poll_option_id) AS amount_of_polloption FROM poll_option";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_polloption;
    }
}
