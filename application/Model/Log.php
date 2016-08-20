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

class Log extends Model
{
    public function getAllLog()
    {
        $sql = "SELECT log_id, log_type_id, log_detail, created_date FROM log";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addLog($log_type_id, $log_detail)
    {
        $sql = "INSERT INTO log (log_type_id, log_detail) VALUES (:log_type_id, :log_detail)";
        $query = $this->db->prepare($sql);
        $parameters = array(':log_type_id' => $log_type_id, ':log_detail' => $log_detail);

        $query->execute($parameters);
    }

    public function deleteLog($log_id)
    {
        $sql = "DELETE FROM log WHERE log_id = :log_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':log_id' => $log_id);

        $query->execute($parameters);
    }

    public function getLog($log_id)
    {
        $sql = "SELECT log_id, log_type_id, log_detail, created_date FROM log WHERE log_id = :log_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':log_id' => $log_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getLogActivate($log_detail){
        $sql = "SELECT log_id, log_type_id, log_detail, created_date FROM log WHERE log_detail = :log_detail LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':log_detail' => $log_detail);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function updateLog($log_id, $log_type_id, $log_detail)
    {
        $sql = "UPDATE log SET log_type_id = :log_type_id, log_detail = :log_detail WHERE log_id = :log_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':log_id' => $log_id, ':log_type_id' => $log_type_id, ':log_detail' => $log_detail);

        $query->execute($parameters);
    }

    public function getAmountOfLog()
    {
        $sql = "SELECT COUNT(log_id) AS amount_of_log FROM log";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_log;
    }
}
