<?php
$rowCount=0;
$i=0;

try {
    include 'connection.php';
    $stmt = $conn->prepare("SELECT id,alt, address FROM ".$tableName);
    $stmt->execute();

    $rowCount=$stmt->rowCount();

     //if the table is empty redirect to sliderManagementPage 'add.php'
    if($rowCount<=0) 
    {
        die('<meta http-equiv="refresh" content="0; URL=add.php">');
    }

    // set the resulting array to associative
   // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

}catch (PDOException $myError)
{
    echo "Faild :".$myError->getMessage();
}
// close connection
$conn=null;

