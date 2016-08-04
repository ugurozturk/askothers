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

class LogType extends Model
{
    public function getAllLogType()
    {
        $sql = "SELECT log_type_id, log_type_detail FROM log_type";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addLogType($log_type_detail)
    {
        $sql = "INSERT INTO log_type (log_type_detail) VALUES (:log_type_detail)";
        $query = $this->db->prepare($sql);
        $parameters = array(':log_type_detail' => $log_type_detail);

        $query->execute($parameters);
    }

    public function deleteLogType($log_type_id)
    {
        $sql = "DELETE FROM log_type WHERE log_type_id = :log_type_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':log_type_id' => $log_type_id);

        $query->execute($parameters);
    }

    public function getLogType($log_type_id)
    {
        $sql = "SELECT log_type_id, log_type_detail FROM log_type WHERE log_type_id = :log_type_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':log_type_id' => $log_type_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateLogType($log_type_id, $log_type_detail)
    {
        $sql = "UPDATE log_type SET log_type_detail = :log_type_detail WHERE log_type_id = :log_type_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':log_type_id' => $log_type_id, ':log_type_detail' => $log_type_detail);

        $query->execute($parameters);
    }

    public function getAmountOfLogType()
    {
        $sql = "SELECT COUNT(log_type_id) AS amount_of_logtype FROM log_type";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_logtype;
    }
}
