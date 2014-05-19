<?php

/* 
 * Used to assist in building the Heatmap layer for the google maps api
 * 
 */
require_once 'recollectAPI.php';

echo json_encode(getRecollectSearches('vancouver'));

