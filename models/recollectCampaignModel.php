<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class recollectCampaignModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "";
		$params['text'] = getRecollectMessage("olathe");
		$params['footer'] = "";
		
		$params['backgroundImage'] = "background.png";
		$params['backgroundColor'] = "#54a341";
		
		return $params;
		
	}
	
}
