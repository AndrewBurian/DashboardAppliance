<?php

require_once 'baseModel.php';

class textModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "Support Ticket";
		$params['text'] = rand(0,100);
		$params['footer'] = "Last updated on " . date("D M j");
		
		$params['backgroundColor'] = "#aaa";
		
		return $params;
		
	}
	
}
