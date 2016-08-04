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

class Comments extends Model
{
    public function getAllComments()
    {
        $sql = "SELECT comment_id, question_id, user_id, comment_detail, active, created_date FROM comments";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addComments($question_id, $user_id, $comment_detail, $active)
    {
        $sql = "INSERT INTO comments (question_id, user_id, comment_detail, active) VALUES (:question_id, :user_id, :comment_detail, :active)";
        $query = $this->db->prepare($sql);
        $parameters = array(':question_id' => $question_id, ':user_id' => $user_id, ':comment_detail' => $comment_detail, ':active' => $active);

        $query->execute($parameters);
    }

    public function deleteComments($comment_id)
    {
        $sql = "DELETE FROM comments WHERE comment_id = :comment_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':comment_id' => $comment_id);

        $query->execute($parameters);
    }

    public function getComments($comment_id)
    {
        $sql = "SELECT comment_id, question_id, user_id, comment_detail, active, created_date FROM comments WHERE comment_id = :comment_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':comment_id' => $comment_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateComments($comment_id, $question_id, $user_id, $comment_detail, $active)
    {
        $sql = "UPDATE comments SET question_id = :question_id, user_id = :user_id, comment_detail = :comment_detail, active = :active WHERE comment_id = :comment_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':comment_id' => $comment_id, ':question_id' => $question_id, ':user_id' => $user_id, ':comment_detail' => $comment_detail, ':active' => $active);

        $query->execute($parameters);
    }

    public function getAmountOfComments()
    {
        $sql = "SELECT COUNT(comment_id) AS amount_of_comments FROM comments";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_comments;
    }
}
