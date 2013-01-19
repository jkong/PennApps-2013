<?php
$host = 'localhost';
$username = 'jobcollc';
$pass = 'Penn15starz!';
$dbname = 'jobcollc_pennappsf2012';
$mysqli = new mysqli($host, $username, $pass, $dbname);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>