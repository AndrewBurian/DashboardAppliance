<?php

/* 
 * Takes in the data to be send to the client and makes an xml response that the
 * client can parse
 */

/**
 * Send the Dashboard to the client
 * 
 * @Designer: 
 * @Programmer:
 * 
 * @param: String of HTML snippet
 * 
 */
function sendDashboard($html){
    $response = new SimpleXMLElement("<response>" . $html . "</response>");
    $response->addAttribute('type', 'dashboard');
    echo $response->asXML();

}

/**
 * Send the widget to the client
 * 
 * @Designer: 
 * @Programmer:
 * 
 * @param: Associated array of widgets
 * 
 */
function sendWidget($widgets){
    $response = new SimpleXMLElement("<response></response>");
    $response->addAttribute('type', 'widget');
    foreach($widgets as $widget){
        $child = $response->addChild('widget', $widget['html']);
        $child->addAttribute('id', $widget['id']);
    }
    echo $response->asXML();
}

function sendPageReload(){
    $response = new SimpleXMLElement("<response></response>");
    $response->addAttribute('type', 'reload');
    echo $response->asXML();
}   