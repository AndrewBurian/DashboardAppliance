<?php

function getRecollectMessage($location) {
	
	$contents = file_get_contents("https://recollect.net/api/dashboard/{$location}/services/waste/message");
	$data = json_decode($contents, TRUE);
	
	return $data['html'];
}

