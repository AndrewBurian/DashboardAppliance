<?php

/**
 * Gets the dashboards associated with a client
 * 
 * @author  Andrew Burian
 * @param   mixed $clientId       The id of the client
 * @return  array               An array of dashboard id's
 */
function getDashboardList($clientId){
    $string = file_get_contents('/data/clients.json');
    $data = json_decode($string, true);
    return $data[$clientId];
}

/**
 * Gets the widgets associated with a dashboard
 * 
 * @author  Andrew Burian
 * @param   mixed $dashboardId      The id of the client
 * @return  array                   An array of widget id's
 */
function getWidgetList($dashboardId){
    $string = file_get_contents('/data/dashboards/' . $dashboardId . '.json');
    $data = json_decode($string, true);
    return $data[$dashboardId];
}

/**
 * Gets the information of a single widget
 * 
 * @author  Andrew Burian
 * @param   mixed $widgetId         The id of the widget
 * @return  array                   An array of widget properties
 */
function getWidget($widgetId){
    $string = file_get_contents('/data/widgets/' . $widgetId . '.json');
    $data = json_decode($string, true);
    return $data[$widgetId];
}