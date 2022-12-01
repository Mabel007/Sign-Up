<?php
$host = "localhost";
$dbname = "login_system";
$username = "root";
$password = "";

// create database connection with msqli connect property
$mysqli = new mysqli($host, $username, $password, $dbname);

//if there is an error stop the script and print a msg with error no.
if ($mysqli->connect_errno){
    die("Connection error:" .$mysqli->connect_error);
}

return $mysqli;

