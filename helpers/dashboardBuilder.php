<?php
error_reporting(-1);
/* 
 * Given a dashboard id, calls the widgetBuilder as nessesary and puts it all
 * into an html fragment.
 * Then calls the responseBuilder to send it to the client
 */

require_once 'config/database.php';
require_once 'helpers/widgetBuilder.php';
require_once 'helpers/responseBuilder.php';
require_once 'config/jsonConfig.php';

/**
 * Build the dashboard
 * 
 * @Designer:  Mat Siwoski/Andrew Burian/Jordan Marling
 * @Programmer: Mat Siwoski
 * 
 * @return: void
 * 
 */
function buildDashboard(){
    //hold snippet of html
    $response = "";
    //Connect to the Database
    //$connection = connectToDB();
    //Get the total number of Widgets
    $dashboardList = getDashboardList($_SESSION['clientID']);
    
    $widgets = getWidgets($dashboardList[0]);
    
    //var_dump($widgets);
    //build html snippet
    foreach($widgets as $widget){
        $response .= $widget['whtml'];
    }
    //Send Response to Client
    sendDashboard($response);
}

/**
 * Get the number of widgets for the dashboard
 * 
 * @Designer: Mat Siwoski
 * @Programmer: Mat Siwoski
 * 
 * @param: $connection - connection to the database
 */
function getWidgets($dashboardID){
    $widgets = array();
    //$widgetData = pg_query($connection, "SELECT * FROM dashboardWidgets JOIN widget ON dashboardWidgets.widgetID = widget.id WHERE dashboardID = '{$_SESSION['dashboardID']}';");
    $widgetData = getWidgetList($dashboardID);
    foreach ($widgetData as $widget){
		//echo $widget;
        $widgets[] = buildWidget($widget[0]);
    }
    return $widgets;
}
