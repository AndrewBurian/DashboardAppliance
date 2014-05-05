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
function buildWidget($id) {

    $widgetType = pg_query("SELECT type FROM widget WHERE id='$id'");
    $widgetModelName = pg_query("SELECT modelName FROM widget WHERE id='$id'");

    /* get the appropriate data from the given model */
    $widgetData = $widgetModelName::getData();
    /* parse the data and get the html fragment for the widget */
    $html = parse($widgetData, $widgetType . "Widget.php");
    /* assign the widget id and the html fragment to an array */
    $widgetArray = [
        $wid => $id,
        $whtml => $html
    ];

    return $widgetArray;
}
