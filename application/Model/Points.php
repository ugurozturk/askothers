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

class Points extends Model
{
    public function getAllPoints()
    {
        $sql = "SELECT point_id, point_value, point_detail FROM points";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addPoints($points_value, $point_detail)
    {
        $sql = "INSERT INTO points (point_value, point_detail) VALUES (:points_value, :point_detail)";
        $query = $this->db->prepare($sql);
        $parameters = array(':point_id' => $point_id);

        $query->execute($parameters);
    }

    public function deletePoints($point_id)
    {
        $sql = "DELETE FROM points WHERE point_id = :point_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':point_id' => $point_id);

        $query->execute($parameters);
    }

    public function getPoints($point_id)
    {
        $sql = "SELECT point_id, point_value, point_detail FROM points WHERE point_id = :point_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':point_id' => $point_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    public function getPointsFromDetail($point_detail)
    {
        $sql = "SELECT point_id, point_value, point_detail FROM points WHERE point_detail like :point_detail LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':point_detail' => $point_detail);
        $query->execute($parameters);

        return $query->fetch();
    }
    
    public function updatePoints($point_id, $points_value, $point_detail)
    {
        $sql = "UPDATE points SET points_value = :points_value, point_detail = :point_detail WHERE point_id = :point_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':point_id' => $point_id, ':points_value' => $points_value, ':point_detail' => $point_detail);

        $query->execute($parameters);
    }

    public function getAmountOfPoints()
    {
        $sql = "SELECT COUNT(point_id) AS amount_of_points FROM points";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_points;
    }
}
