<?php

require_once 'baseModel.php';

class testTextModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "Jordan's Widget";
		$params['text'] = "testTextModel Text";
		$params['footer'] = "testTextModel Footer";
		
		return $params;
		
	}
	
}
