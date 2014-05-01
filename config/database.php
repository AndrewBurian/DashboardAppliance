<?php
error_reporting(-1);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
/**
 * Connect to the Database
 * 
 * @Designer: Mat Siwoski
 * @Programmer:Mat Siwoski
 * 
 * @return: void
 * 
 */
function connectToDB(){
    $con = mysqli_connect(dbHost, dbUser, dbPassword, dbName);
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    //return $con;
}