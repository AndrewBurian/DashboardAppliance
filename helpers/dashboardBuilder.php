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
	
	$_SESSION['widgets'] = array();
	
    //hold snippet of html
    $response = "";
    
    //Get the total number of Widgets
    $dashboardList = getDashboardList($_SESSION['clientID']);
    
    //get the list of widgets on the current dashboard
    $widgets = getWidgets($dashboardList[$_SESSION['currentDashboard']]);
    
    //build html snippet
    foreach($widgets as $widget){
        $response .= $widget['whtml'];
    }
    
    //Send Response to Client
    sendDashboard($response);
    
    
    //set the next update time of the dashboard
    $_SESSION['dashboardTime'] = time() + (getDashboardTime($dashboardList[$_SESSION['currentDashboard']]) * 10);
    
    //go to the next dashboard on the list
    $_SESSION['currentDashboard']++;
    if ($_SESSION['currentDashboard'] >= count($dashboardList)) {
		$_SESSION['currentDashboard'] = 0;
	}
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
        $widgets[] = buildWidget($widget);
    }
    return $widgets;
}
