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
    $connection = connectToDB();
    //Get the total number of Widgets
    $widgets = getWidgets($connection);
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
function getWidgets($connection){
    $widgets = array();
    //$widgetData = $connection->query("SELECT * FROM dashboardWidgets WHERE dashboardID = '{$_SESSION['dashboardID']}';",MYSQLI_USE_RESULT);
    $widgetData = $connection->query("SELECT * FROM dashboardWidgets 
											JOIN widget 
												ON dashboardWidgets.widgetID=widget.id 
											WHERE dashboardID='{$_SESSION['dashboardID']}';"
									,MYSQLI_USE_RESULT);
    
    while ($row = mysqli_fetch_assoc($widgetData)) {
        $widgets[] = buildWidget($row['id'], $row['widgetType'], $row['modelName']);
    }
    
    return $widgets;
}
