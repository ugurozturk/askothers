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

class UserType extends Model
{

    public function getAllUserType()
    {
        $sql = "SELECT user_type_id, user_type_name FROM user_type";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addUserType($user_type_name)
    {
        $sql = "INSERT INTO user_type (user_type_name) VALUES (:user_type_name)";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_type_name' => $user_type_name);

        $query->execute($parameters);
    }

    public function deleteUserType($user_type_id)
    {
        $sql = "DELETE FROM user_type WHERE user_type_id = :user_type_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_type_id' => $user_type_id);

        $query->execute($parameters);
    }

    public function getUserType($user_type_id)
    {
        $sql = "SELECT user_type_id, user_type_name FROM user_type WHERE user_type_id = :user_type_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_type_id' => $user_type_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateUserType($user_type_id,$user_type_name)
    {
        $sql = "UPDATE user_type SET user_type_name = :user_type_name WHERE user_type_id = :user_type_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_type_id' => $user_type_id, ':user_type_name' => $user_type_name);

        $query->execute($parameters);
    }

    public function getAmountOfUserType()
    {
        $sql = "SELECT COUNT(user_type_id) AS amount_of_usertypes FROM user_type";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_usertypes;
    }
}
