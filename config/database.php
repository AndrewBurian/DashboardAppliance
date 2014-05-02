<?php
error_reporting(-1);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
   
require_once 'constants.php';

/**
 * Connect to the Database
 * 
 * @Designer: Mat Siwoski
 * @Programmer:Mat Siwoski
 * 
 * @return: connection to the db
 * 
 */
function connectToDB(){
    $con = mysqli_connect(dbHost, dbUser, dbPassword, dbName);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    return $con;
}