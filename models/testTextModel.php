<?php

require_once 'baseModel.php';

class testTextModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "Recollect Dashboard Appliance";
		$params['text'] = "Current Time: " . date("H:i", time());
		$params['footer'] = "City of Vancouver Waste Collection";
		
		return $params;
		
	}
	
}
