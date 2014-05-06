<?php

include_once 'parser.php';
require_once 'config/jsonConfig.php';
/*
 * Given a widget name, calls the appropriate data model, and parses the data
 * into the view and returns the html fragment
 */

/**
 * Build the widget
 * 
 * @Designer: 
 * @Programmer:
 * 
 * @param: id of widget
 * @return: String of HTML snippet
 * 
 */
<<<<<<< HEAD
function buildWidget($id, $widgetType, $widgetModelName) {

    require_once "models/{$widgetModelName}.php";
=======
function buildWidget($id) {
	
	$widget = getWidget($id);
	
	require_once "models/{$widget['model']}.php";
>>>>>>> origin/Server

    /* get the appropriate data from the given model */
    $widgetModel = new $widget['model']();
    $widgetData = $widgetModel->getData();
    
    /* parse the data and get the html fragment for the widget */
    $content = array();
    $content['content'] = parse($widgetData, $widget['type'] . 'Widget.php');
    $html = parse($content, 'baseWidget.php');
    /* assign the widget id and the html fragment to an array */
    $widgetArray = array(
        'wid' => $id,
        'whtml' => $html
    );
	
    return $widgetArray;
}
