<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//require_once "helpers/dashboardBuilder.php";

//buildDashboard();

//require_once "helpers/recollectAPI.php";

//echo getRecollectMessage("olathe");

require_once 'helpers/cacheManager.php';

echo getCachedData("http://192.168.0.59/DashboardAppliance/testdata_delete/olathe_message.json");
