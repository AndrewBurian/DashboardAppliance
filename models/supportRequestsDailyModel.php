<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class supportRequestsDailyModel extends baseModel {
	
	function getData() {
		
                $amount= getRecollectSupportRequests('olathe', '1day');
                $prior = $amount['prior']; 
                $last =  $amount['last'];
            
		$params = array();
		$params['title'] = "Today's Support Requests";
		$params['text'] = $last;
                $params['footer'] = "Last updated on " . date("D M j");

                $params['backgroundColor'] = "#aaa";
                if ($last >= $prior){
                    $params['backgroundImage'] = 'up.png';
                }else{
                    $params['backgroundImage'] = 'down.png';
                }
                return $params;
		
	}
	
}
