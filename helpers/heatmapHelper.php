<?php

/* 
 * Used to assist in building the Heatmap layer for the google maps api
 * 
 * @author: Mat Siwoski
 * 
 */
require_once 'recollectAPI.php';

echo json_encode(getRecollectSearches('vancouver'));

