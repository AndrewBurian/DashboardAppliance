<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class supportRequestsWeeklyModel extends baseModel {
	
	function getData() {
		
                $amount= getRecollectSupportRequests('olathe', '1week');
                $prior = $amount['prior']; 
                $last =  $amount['last'];
                $change = $last - $prior;
                $percent = ($change/$prior) * 100;
		$params = array();
		$params['title'] = "This Week's Support Requests";
		$params['text'] = $last;
                $params['percentage'] = number_format($percent, 0)."%";
                $params['footer'] = "Last updated on " . date("D M j");
                $params['footerColor'] = "#ce6a00";
                $params['backgroundColor'] = "#FF9618";
                if ($last > $prior){
                    $params['arrowImage'] = 'data/images/up.png';
                }else if ($last < $prior){
                    $params['arrowImage'] = 'data/images/down.png';
                } else {
                    $params['arrowImage'] = 'data/images/noChange.png';
                }
                return $params;
		
	}
	
}
