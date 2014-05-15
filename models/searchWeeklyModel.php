<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class searchWeeklyModel extends baseModel {
	
	function getData() {
		
                $amount= getRecollectSupportRequests('olathe', '1week');
                $prior = $amount['prior']; 
                $last =  $amount['last'];
            
		$params = array();
		$params['title'] = "Recent Weekly Searches";
		$params['text'] = $last;
                //Confirmed working
                //$params['text'] = getRecollectCount("olathe", "reminders", "1week");
		
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
