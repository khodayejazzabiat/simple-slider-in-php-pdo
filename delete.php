<?php

$targetId=$_POST['id'];
$targetAdress=$_POST['address'];
$rowCount=0;
$i=0;

try {
    include ("include/connection.php");

    $stmt = $conn->prepare("DELETE FROM `".$tableName."` WHERE `".$tableName."`.`id` = ".$targetId);
    $stmt->execute();

    unlink($targetAdress);

    die('<meta http-equiv="refresh" content="0; URL=panel.php">');


}catch (PDOException $myError)
{
    die("Database Faild :".$myError->getMessage());
}catch (Exception $myError)
{
    die("Unlink File Faild :".$myError->getMessage());
}
// close connection
$conn=null;
