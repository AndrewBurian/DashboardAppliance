<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class infoModel extends baseModel {

    function getData($widgetParams) {


        $params = array();
        $params['title'] = "Recent Weekly Searches";
        $params['text'] = "This map shows the last 50 searchs in the Vancouver represented by the Google heatmaps.";
        //Confirmed working
        //$params['text'] = getRecollectCount("olathe", "reminders", "1week");

        $params['footer'] = "Last updated on " . date("D M j");

        $params['backgroundColor'] = "#aaa";

        return $params;
    }

}
