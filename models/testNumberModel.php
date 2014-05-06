<?php

require_once 'baseModel.php';

class testNumberModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['dollarAmount'] = "$50";
		$params['percentageChange'] = "82%";
                $params['currencyTitle'] = "In billions";
		$params['lastUpdated'] = "Last updated at 10:09";
		
		return $params;
		
	}
	
}
