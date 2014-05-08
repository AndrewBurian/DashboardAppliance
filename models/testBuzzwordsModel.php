<?php

require_once 'baseModel.php';

class testBuzzwordsModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "Buzzwords";
                
                $params['olable'] = "item #1";
                $params['olvalue'] = "9000 times";
                
                $params['ulable'] = "more stuff";
                $params['ulvalue'] = "0101000100";
                
		$params['footer'] = "footer here";
		
		return $params;
		
	}
	
}