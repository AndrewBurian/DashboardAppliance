<?php
date_default_timezone_set('PST8PDT');

require_once 'baseModel.php';

class testCyclingTextModel extends baseModel {
	
	function getData() {
		
		$params = array();
                $params['title1'] = "Recollect Dashboard Appliance";
		$params['text1'] = "Current Time: " . date("H:i", time());
		$params['footer1'] = "City of Vancouver Waste Collection";
		
		
		$params['title2'] = "Jordan's Widget2";
		$params['text2'] = "testTextModel Text2";
		$params['footer2'] = "testTextModel Footer2";
		
		$params['title3'] = "Jordan's Widget3";
		$params['text3'] = "testTextModel Text3";
		$params['footer3'] = "testTextModel Footer3";
		
		return $params;
		
	}
	
}
