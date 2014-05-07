<?php

require_once 'baseModel.php';

class testGraphModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "testTextModel Title";
		$params['value'] = 50;
		
		return $params;
		
	}
	
}
