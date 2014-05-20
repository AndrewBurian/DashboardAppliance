<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

/**
 * Weekly Support Requests. This is a model that will report the weekly 
 * support requests and send the information to the view.
 * 
 * @author  Mat Siwoski
 */
class supportRequestsQuarterlyModel extends baseModel {

    /**
     * Set the correct parameter information.
     * 
     * @author  Mat Siwoski 
     */
    function getData() {

        $amount = getRecollectSupportRequests('vancouver', '3months');
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
        $params['title'] = "Quarterly Support Requests";
        $params['text'] = $last;
        $params['percentage'] = abs(ceil($percent)) . "% vs. past quarter";
        $params['footer'] = "Last updated on " . date("D M j");
        $params['footerColor'] = "#ce6a00";
        $params['backgroundColor'] = "#FF9618";
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
