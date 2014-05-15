<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class supportRequestsWeeklyModel extends baseModel {
	
	function getData() {
		
                $amount= getRecollectSupportRequests('olathe', '1week');
                $prior = $amount['prior']; 
                $last =  $amount['last'];
            
		$params = array();
		$params['title'] = "This Week's Support Requests";
		$params['text'] = $last;
                $params['footer'] = "Last updated on " . date("D M j");

                $params['backgroundColor'] = "#FF9618";
                if ($last >= $prior){
                    $params['backgroundImage'] = 'up.png';
                }else{
                    $params['backgroundImage'] = 'down.png';
                }
                return $params;
		
	}
	
}
