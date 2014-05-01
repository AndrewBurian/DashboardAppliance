<?php

/**
 * The landing site for all incoming client requests
 *
 * @author  Andrew Burian
 * @author  Jordan Marling
 * @date    April 30, 2014
 */

require_once 'controllers/widgetUpdater.php';
require_once 'controllers/dashboardBuilder.php';
require_once 'helpers/parser.php';

// check to ensure the client has sent their ID with the request
if(!isset($_GET['id'])){
    echo "No id, rejected";
    exit;
}

// start use of the client's session
session_start();

// check to see if this is the client's first connection
if(!isset($_SESSION['active'])){
    $_SESSION['active'] = true;
    
    // echo the first time html shell
    $view = array();
    echo parse($view, 'main.php');
    exit;
}

// Session is already started

if($_SESSION['dashboard'] > time()){
    build();
    exit;
}

update();
exit;
