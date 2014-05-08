<?php

require_once 'baseModel.php';

class testGraphModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "testTextModel Title";
		$params['value'] = 50;
                
                $params['x0'] = "jan";
                $params['x1'] = "feb";
                $params['x2'] = "mar";
                $params['x3'] = "apr";
                $params['x4'] = "may";
                $params['x5'] = "jun";
                $params['x6'] = "jul";
                $params['x7'] = "aug";
                $params['x8'] = "sept";
                
                $params['y0'] = "10";
                $params['y1'] = "20";
                $params['y2'] = "30";
                $params['y3'] = "40";
		
		return $params;
		
	}
	
}
