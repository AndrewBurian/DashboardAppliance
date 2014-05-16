<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class supportRequestsDailyModel extends baseModel {
	
	function getData() {
		
                $amount= getRecollectSupportRequests('olathe', '1day');
                $prior = $amount['prior']; 
                $last =  $amount['last'];
                $change = $last - $prior;
                $percent = ($change/$prior) * 100;
                
		$params = array();
		$params['title'] = "Today's Support Requests";
		$params['text'] = $last;
                $params['percentage'] = number_format($percent, 0)."%";
                
                $params['footer'] = "Last updated on " . date("D M j");
                $params['backgroundColor'] = "#FF9618";
                $params['footerColor'] = "#e5800d";
                if ($last >= $prior){
                    $params['backgroundImage'] = 'up.png';
                }else{
                    $params['backgroundImage'] = 'down.png';
                }
                
                
                return $params;
		
	}
	
}
