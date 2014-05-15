<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class textModel extends baseModel {
	
	function getData() {
		
                $old = rand(1, 10);
                $new = rand(1, 10);
            
		$params = array();
		$params['title'] = "Recent Weekly Searches";
		$params['text'] = $new;
                //Confirmed working
                //$params['text'] = getRecollectCount("olathe", "reminders", "1week");
		
                $params['footer'] = "Last updated on " . date("D M j");

                $params['backgroundColor'] = "#aaa";
                if ($new >= $old){
                    $params['backgroundImage'] = 'up.png';
                }else{
                    $params['backgroundImage'] = 'down.png';
                }
                return $params;
		
	}
	
}
