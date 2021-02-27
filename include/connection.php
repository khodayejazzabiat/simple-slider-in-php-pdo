<?php
$serverName = "localhost";
$databaseName="phpslider";
$tableName="slider";
$username = "root";
$password = "";
$conn=null;



// connect to database
$conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
