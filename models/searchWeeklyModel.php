<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class searchWeeklyModel extends baseModel {
	
	function getData() {
		
                $amount= getRecollectSupportRequests('olathe', '1week');
                $prior = $amount['prior']; 
                $last =  $amount['last'];
                $change = $last - $prior;
                $percent = ($change/$prior) * 100;
                
		$params = array();
		$params['title'] = "Recent Weekly Searches";
		$params['text'] = $last;
                $params['percentage'] = number_format($percent, 0)."%";
                $params['footer'] = "Last updated on " . date("D M j");
                $params['footerColor'] = "#c94118";
                $params['backgroundColor'] = "#EC663C";
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
