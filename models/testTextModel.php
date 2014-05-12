<?php

require_once 'baseModel.php';

class testTextModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "Support Ticket";
		$params['text'] = rand(0,100);
		$params['footer'] = "Last updated on " . date("D M j");
		
		return $params;
		
	}
	
}
