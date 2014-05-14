<?php

require_once 'baseModel.php';
require_once 'helpers/recollectAPI.php';

class recollectCampaignModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "";
		$params['text'] = getRecollectMessage("Vancouver");
		$params['footer'] = "";
		
		$params['backgroundImage'] = "bgRecollect.png";
		$params['backgroundColor'] = "#54a341";
		
		return $params;
		
	}
	
}