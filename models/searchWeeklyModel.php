<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

/**
 * Search Weekly Model. This is a model that will the weekly searches
 * and report to the user as a number with a percent change.
 * 
 * @author  Mat Siwoski
 */
class searchWeeklyModel extends baseModel {

    /**
     * Set the correct parameter information.
     * 
     * @author  Mat Siwoski 
     */
    function getData() {

        //$amount = getRecollectSupportRequests('vancouver', '1week');
        $amount = getRecollectCount('vancouver', 'searches', '1week');
        $prior = $amount['prior'];
        $last = $amount['last'];
        $change = $last - $prior;
        if ($prior > 0){
           $percent = ($change / $prior) * 100;
        }
        else {
            $percent = $change * 100;
        }
        $params = array();
        $params['title'] = "Recent Weekly Searches";
        $params['text'] = $last;
        $params['percentage'] = abs(ceil($percent)) . "% since last week";
        $params['footer'] = "Last updated on " . date("D M j");
        $params['footerColor'] = "#c94118";
        $params['backgroundColor'] = "#EC663C";
        if (ceil($percent) > 0) {
            $params['arrowImage'] = 'data/images/up.png';
        } else if (ceil($percent) < 0) {
            $params['arrowImage'] = 'data/images/down.png';
        } else {
            $params['arrowImage'] = 'data/images/noChange.png';
        }
        return $params;
    }

}
