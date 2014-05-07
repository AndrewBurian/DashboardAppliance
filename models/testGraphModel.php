<?php

require_once 'baseModel.php';

class testGraphModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "testTextModel Title";
		$params['value'] = 50;
                
                $params['t0'] = "jan";
                $params['t1'] = "feb";
                $params['t2'] = "mar";
                $params['t3'] = "apr";
                $params['t4'] = "may";
                $params['t5'] = "jun";
                $params['t6'] = "jul";
                $params['t7'] = "aug";
                $params['t8'] = "sept";
		
		return $params;
		
	}
	
}
