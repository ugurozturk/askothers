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

class UserActivate extends Model
{
    public function getAllUserActivate()
    {
        $sql = "SELECT user_activate_id, user_id, activate_code, created_date FROM user_activate";
        $query = $this->db->prepare($sql);
        $query->execute();
        //#bf82f4 UserType nesnesi oluşturarak return da onu çağır. Oradan da getUserType ile gelen veriyi bu nesneye bağlamaya çalış.

        return $query->fetchAll();
    }

    public function addUserActivate($user_id, $activate_code)
    {
        $sql = "INSERT INTO user_activate (user_id, activate_code) VALUES (:user_id, :activate_code)";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id, ':activate_code' => $activate_code);

        $query->execute($parameters);
    }

    public function deleteUserActivate($user_activate_id)
    {
        $sql = "DELETE FROM user_activate WHERE user_activate_id = :user_activate_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_activate_id' => $user_activate_id);

        $query->execute($parameters);
    }

    public function getUserActivate($user_activate_id)
    {
        $sql = "SELECT user_activate_id, user_id, activate_code, created_date FROM user_activate WHERE user_activate_id = :user_activate_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_activate_id' => $user_activate_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getUserActivateByUseridAndCode($user_id, $activate_code)
    {
        $sql = "SELECT user_activate_id, user_id, activate_code, created_date FROM user_activate WHERE user_id = :user_id AND activate_code = :activate_code LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id, ':activate_code' => $activate_code);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getAmountOfUserActivate()
    {
        $sql = "SELECT COUNT(user_activate_id) AS amount_of_useractivates FROM user_activate";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_useractivates;
    }
}
