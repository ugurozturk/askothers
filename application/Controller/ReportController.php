<?php

namespace Mini\Controller;

use Mini\Model\Reports;

class ReportController
{
    public function index(){
        header('location: ' . URL);
    }

    public function r($type_id, $report_detail){
        if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];

        $reportModel = new Reports;
        $reportModel->addReports($type_id, $user_id, $report_detail);

        }
        else{

        }
    }
}