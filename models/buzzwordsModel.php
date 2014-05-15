<?php

require_once 'baseModel.php';

class buzzwordsModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title'] = "Buzzwords";
                
                $params['olabel'] = "Garbage: ";
                $params['olvalue'] = "9000 times";
                
                $params['olabel2'] = "Trash: ";
                $params['olvalue2'] = "1 times";
                
                //$params['ulable'] = "more stuff";
                //$params['ulvalue'] = "0101000100";
                $params['backgroundColor'] = "#e064fc";
                
                
		$params['footer'] = "Words Spoken";
		
		return $params;
		
	}
	
}