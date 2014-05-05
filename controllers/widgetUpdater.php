<?php

include 'helpers/responseBuilder.php';
include 'helpers/widgetBuilder.php';
/* 
 * Given a widget id, loads the model, gets the dataset for the widget, and
 * calls the responseBuilder to send the data back to the client
 */

/*
 * Update the widget
 * 
 * @Designer: 
 * @Programmer:
 * 
 */
function update($id){
    /* get the html fragment for the widget */
    $widgetData = buildWidget($id);
    
    /* send the widget to the client */
    sendWidget($widgetData);
}