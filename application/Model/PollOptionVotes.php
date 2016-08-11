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

class PollOptionVotes extends Model
{
    public function getAllPollOptionVotes()
    {
        $sql = "SELECT poll_option_vote_id, poll_option_id, user_id, created_date FROM poll_option_votes";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addPollOptionVotes($poll_option_id, $user_id)
    {
        $sql = "INSERT INTO poll_option_votes (poll_option_id, user_id) VALUES (:poll_option_id, :user_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_id' => $poll_option_id, 'user_id' => $user_id);

        $query->execute($parameters);
    }

    public function deletePollOptionVotes($poll_option_vote_id)
    {
        $sql = "DELETE FROM poll_option_votes WHERE poll_option_vote_id = :poll_option_vote_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_vote_id' => $poll_option_vote_id);

        $query->execute($parameters);
    }

    public function getPollOptionVotes($poll_option_vote_id)
    {
        $sql = "SELECT poll_option_vote_id, poll_option_id, user_id, created_date FROM poll_option_votes WHERE poll_option_vote_id = :poll_option_vote_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_vote_id' => $poll_option_vote_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function updatePollOptionVotes($poll_option_vote_id, $poll_option_id, $user_id)
    {
        $sql = "UPDATE poll_option_votes SET poll_option_id = :poll_option_id, user_id = :user_id WHERE poll_option_vote_id = :poll_option_vote_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':poll_option_vote_id' => $poll_option_vote_id, ':poll_option_id' => $poll_option_id, ':user_id' => $user_id);

        $query->execute($parameters);
    }

    public function getAmountOfPollOptionVotes()
    {
        $sql = "SELECT COUNT(poll_option_vote_id) AS amount_of_polloptionvotes FROM poll_option_votes";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_polloptionvotes;
    }
}
