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

class Reports extends Model
{

    public function getAllReports()
    {
        $sql = "SELECT report_id, report_type_id, user_id, report_detail, created_date FROM reports";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function addReports($report_type_id, $user_id, $report_detail)
    {
        $sql = "INSERT INTO reports (report_type_id, user_id, report_detail) VALUES (:report_type_id, :user_id, :report_detail)";
        $query = $this->db->prepare($sql);
        $parameters = array(':report_type_id' => $report_type_id, ':report_detail' => $report_detail, ':user_id' => $user_id);

        $query->execute($parameters);
    }

    public function getAmountOfReports()
    {
        $sql = "SELECT COUNT(report_id) AS amount_of_report FROM reports";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_report;
    }
}
