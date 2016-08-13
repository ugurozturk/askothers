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
        $sql = "SELECT poll_option_id, question_id, poll_option_detail, active, created_date FROM poll_option";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getAllPollOptionByQuestion($question_id)
    {
        $sql = "SELECT po.poll_option_id, po.question_id, po.poll_option_detail, po.active, po.created_date, COUNT(poll_option_votes.poll_option_id) AS voted, (Select sum(voted) AS tpl from  (SELECT poll_option.poll_option_id AS poid, COUNT(poll_option_votes.poll_option_id) AS voted FROM poll_option LEFT JOIN poll_option_votes ON poll_option.poll_option_id = poll_option_votes.poll_option_id WHERE question_id = :question_id GROUP BY poll_option.poll_option_id ) AS T) AS tpl FROM poll_option AS po LEFT JOIN poll_option_votes ON po.poll_option_id = poll_option_votes.poll_option_id WHERE question_id = :question_id GROUP BY po.poll_option_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':question_id' => $question_id);
        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getPollOption($poll_option_id)
    {
        $sql = "SELECT poll_option_id, question_id, poll_option_detail, active, created_date FROM poll_option WHERE poll_option_id = :poll_option_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_id' => $poll_option_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getQuestionid($poll_option_id)
    {
        $sql = "SELECT poll_option_id, question_id, poll_option_detail, active, created_date FROM poll_option WHERE poll_option_id = :poll_option_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_id' => $poll_option_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function addPollOption($question_id, $poll_option_detail, $active)
    {
        $sql = "INSERT INTO poll_option (question_id, poll_option_detail, active) VALUES (:question_id, :poll_option_detail, :active)";
        $query = $this->db->prepare($sql);
        $parameters = array(':question_id' => $question_id, ':poll_option_detail' => $poll_option_detail, ':active' => $active);

        $query->execute($parameters);
        return $this->db->lastInsertId();
    }

    public function deletePollOption($poll_option_id)
    {
        $sql = "DELETE FROM poll_option WHERE poll_option_id = :poll_option_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_id' => $poll_option_id);

        $query->execute($parameters);
    }

    public function updatePollOption($poll_option_id, $question_id, $poll_option_detail, $active)
    {
        $sql = "UPDATE poll_option SET question_id = :question_id, poll_option_detail = :poll_option_detail,  active = :active WHERE poll_option_id = :poll_option_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_id' => $poll_option_id, ':question_id' => $question_id, ':poll_option_detail' => $poll_option_detail , ':active' => $active);

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
