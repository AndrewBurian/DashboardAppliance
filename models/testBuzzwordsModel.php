<?php

require_once 'baseModel.php';

class testBuzzwordsModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "";
		$params['lastUpdate'] = "";
		
		return $params;
		
	}
	
}