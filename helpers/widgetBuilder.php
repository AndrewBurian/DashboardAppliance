<?php

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
function buildWidget($id){
    
    $widgetType = mysql_query("SELECT type FROM widget WHERE id='$id'");
    $widgetModelName = mysql_query("SELECT modelName FROM widget WHERE id='$id'");
    
    $widgetData = $widgetModelName->getData();
    
    
    if ($widgetType == 'numbers') {
        
        $html = "<li data-row=\"2\" data-col=\"1\" data-sizex=\"1\" data-sizey=\"1\" class=\"gs_w\">
                <div data-id=\"valuation\" data-title=\"Current Valuation\" data-moreinfo=\"In billions\" data-prefix=\"$\" class=\"widget widget-number valuation\"><h1 class=\"title\" data-bind=\"title\">Current Valuation</h1>

                <h2 class=\"value\" data-bind=\"current | shortenedNumber | prepend prefix | append suffix\">$75</h2>

                <p class=\"change-rate\">
                  <i data-bind-class=\"arrow\" class=\"icon-arrow-down\"></i><span data-bind=\"difference\"></span>
                </p>

                <p class=\"more-info\" data-bind=\"moreinfo | raw\">In billions</p>

                <p class=\"updated-at\" data-bind=\"updatedAtMessage\">" . $widgetData['lastudpated'] . "</p>
                </div>
                </li>";
    }
    
    $widgetArray = [
        $wid => $id,
        $whtml => $html
    ];
    
   return $widgetArray;
}