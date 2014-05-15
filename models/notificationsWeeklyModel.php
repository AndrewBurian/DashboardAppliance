<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class notificationsWeeklyModel extends baseModel {
	
	function getData() {
		
                $amount= getRecollectCount('olathe','notifications','1week');
                $prior = $amount['prior']; 
                $last =  $amount['last'];
            
		$params = array();
		$params['title'] = "Recent Weekly Notifications";
		$params['text'] = $last;
                $params['footer'] = "Last updated on " . date("D M j");

                $params['backgroundColor'] = "#EC663C";
                if ($last >= $prior){
                    $params['backgroundImage'] = 'up.png';
                }else{
                    $params['backgroundImage'] = 'down.png';
                }
                return $params;
		
	}
	
}
