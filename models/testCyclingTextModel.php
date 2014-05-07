<?php

require_once 'baseModel.php';

class testCyclingTextModel extends baseModel {
	
	function getData() {
		
		$params = array();
		$params['title1'] = "Jordan's Widget1";
		$params['text1'] = "testTextModel Text1";
		$params['footer1'] = "testTextModel Footer1";
		
		$params['title2'] = "Jordan's Widget2";
		$params['text2'] = "testTextModel Text2";
		$params['footer2'] = "testTextModel Footer2";
		
		$params['title3'] = "Jordan's Widget3";
		$params['text3'] = "testTextModel Text3";
		$params['footer3'] = "testTextModel Footer3";
		
		return $params;
		
	}
	
}
