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

class User extends Model
{
    public function getAllUser()
    {
        $sql = "SELECT user_id, user_type_id, points, username, password, email, phone, active, created_date FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();
        //#bf82f4 UserType nesnesi oluşturarak return da onu çağır. Oradan da getUserType ile gelen veriyi bu nesneye bağlamaya çalış.

        return $query->fetchAll();
    }

    public function addUser($user_type_id, $points, $username, $password, $email, $phone, $active)
    {
        $sql = "INSERT INTO user (user_type_id, points, username, password, email, phone, active) VALUES (:user_type_id, :points, :username, :password, :email, :phone, :active)";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_type_id' => $user_type_id, ':points' => $points, ':username' => $username, ':password' => $password, ':email' => $email, ':phone' => $phone, ':active' => $active);

        $query->execute($parameters);
    }

    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM user WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);

        $query->execute($parameters);
    }

    public function getUser($user_id)
    {
        $sql = "SELECT user_id, user_type_id, points, username, password, email, phone, active, created_date FROM user WHERE user_id = :user_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateUser($user_id, $user_type_id, $points, $username, $password, $email, $phone, $active)
    {
        $sql = "UPDATE user SET user_type_id = :user_type_id, points = :points, username = :username, password = :password, email = :email, phone = :phone, active = :active WHERE user_id = :user_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id, ':user_type_id' => $user_type_id, ':points' => $points, ':username' => $username, ':password' => $password, ':email' => $email, ':phone' => $phone, ':active' => $active);

        $query->execute($parameters);
    }

    public function getAmountOfUser()
    {
        $sql = "SELECT COUNT(user_id) AS amount_of_user FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_user;
    }
}
