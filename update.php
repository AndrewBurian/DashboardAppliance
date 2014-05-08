<?php

/**
 * The landing site for all incoming client requests
 *
 * @author  Andrew Burian
 * @author  Jordan Marling
 * @date    April 30, 2014
 */

require_once 'controllers/widgetUpdater.php';
require_once 'helpers/dashboardBuilder.php';
require_once 'helpers/parser.php';

// check to ensure the client has sent their ID with the request
if(!isset($_GET['id'])){
    echo "No id, rejected";
    exit;
}

session_start();

// Session is already started
if($_SESSION['dashboardTime'] <= time()){
    buildDashboard();
    exit;
}

update();
