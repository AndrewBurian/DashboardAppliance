<?php
error_reporting(-1);
/* 
 * Given a dashboard id, calls the widgetBuilder as nessesary and puts it all
 * into an html fragment.
 * Then calls the responseBuilder to send it to the client
 */
require_once 'config/database.php';

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
    //Connect to the Database
    $connection = connectToDB();
    //get widgets
    getWidgets($connection);
  
    //loop through widget
    //build widget function
    //build snippet html
    //send response
    
}

/**
 * Get the number of widgets for the dashboard
 * 
 * @param type $connection
 */
function getWidgets($connection){
    $numOfWidgets = $connection->query("SELECT * FROM dashboardWidgets WHERE dashboardID = '{$_SESSION['dashboardID']}';",MYSQLI_USE_RESULT);
    
    while ($count = mysqli_fetch_row($numOfWidgets)) {
        var_dump($count);
        $count++;
    }
    return $count;
}
