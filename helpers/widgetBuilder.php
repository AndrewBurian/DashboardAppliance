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

function buildWidget($id) {
	
    $widget = getWidget($id);
    
    $_SESSION['widgets'][$id] = time() + $widget['time'];
	
    require_once "models/{$widget['model']}.php";

    /* get the appropriate data from the given model */
    $widgetModel = new $widget['model']();
    $widgetData = $widgetModel->getData();
    
    /* parse the data and get the html fragment for the widget */
    $content = array();
    $content['width'] = $widget['width'] * 306 + ($widget['width'] - 1) * 10;
    $content['height'] = $widget['height'] * 306 + ($widget['height'] - 1) * 10;
    $content['id'] = $id;
    $content['content'] = parse($widgetData, $widget['type'] . 'Widget.php');
    $html = parse($content, 'baseWidget.php');
    
    /* assign the widget id and the html fragment to an array */
    $widgetArray = array(
        'wid' => $id,
        'whtml' => $html
    );
	
    return $widgetArray;
}
