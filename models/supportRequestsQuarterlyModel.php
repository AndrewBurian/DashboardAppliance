<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class supportRequestsQuarterlyModel extends baseModel {
	
	function getData() {
		
                $amount= getRecollectSupportRequests('olathe', '3months');
                $prior = $amount['prior']; 
                $last =  $amount['last'];
                $change = $last - $prior;
                $percent = ($change/$prior) * 100;
                
		$params = array();
		$params['title'] = "Quarterly Support Requests";
		$params['text'] = $last;
                $params['percentage'] = number_format($percent, 0)."%";
                $params['footer'] = "Last updated on " . date("D M j");
                $params['footerColor'] = "#e5800d";
                $params['backgroundColor'] = "#FF9618";
                if ($last >= $prior){
                    $params['backgroundImage'] = 'up.png';
                }else{
                    $params['backgroundImage'] = 'down.png';
                }
                return $params;
		
	}
	
}