<?php

include_once 'parser.php';
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
function buildWidget($id, $widgetType, $widgetModelName) {

	require_once "models/{$widgetModelName}.php";

    /* get the appropriate data from the given model */
    $widgetModel = new $widgetModelName();
    $widgetData = $widgetModel->getData();
    
    /* parse the data and get the html fragment for the widget */
    $html = parse($widgetData, $widgetType . "Widget.php");
    /* assign the widget id and the html fragment to an array */
    $widgetArray = array(
        'wid' => $id,
        'whtml' => $html
    );
	
    return $widgetArray;
}
