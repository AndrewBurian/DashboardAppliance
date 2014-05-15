<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class remindersWeeklyModel extends baseModel {
	
	function getData() {
		
                $amount= getRecollectCount('olathe','reminders','1week');
                $prior = $amount['prior']; 
                $last =  $amount['last'];
            
		$params = array();
		$params['title'] = "Recent Weekly Reminders";
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
