<?php

include 'include/validation.php';

try
{

 if ($_SERVER["REQUEST_METHOD"] === "POST")
 {
   //if(isset...).... 
    $iId=$_POST['id'];
    $iNewAlt=testAlt($_POST['img_alt']) ;
    $iNewSlide=$_FILES['img_file'];

    if(altValidation($iNewAlt)===true)
   {
    
    include 'include/connection.php';
    
     if (imageValidation($iNewSlide)===true)   //update both slide and alt
     { 

        $stmt = $conn->prepare("SELECT address FROM `".$tableName."` WHERE `".$tableName."`.`id` = :iId");
        $stmt->execute(array(':iId' => $iId));
        unlink($stmt->fetchColumn());
       
        $slideAddress="files/".uniqid('img_',false);
        move_uploaded_file($iNewSlide['tmp_name'],$slideAddress);
        
        $stmt = $conn->prepare("UPDATE `".$tableName."` SET `alt` = :iAlt,`address` = :iAddress WHERE `".$tableName."`.`id` = :iId");
        $stmt->execute(array(':iAlt' => $iNewAlt,'iAddress'=>$slideAddress ,':iId' => $iId));


     }else  //only update alt
      {
   
       $stmt = $conn->prepare("UPDATE `".$tableName."` SET `alt` = :iAlt WHERE `".$tableName."`.`id` = :iId");
       $stmt->execute(array(':iAlt' => $iNewAlt, ':iId' => $iId));
        
      }
      
      $conn=null; 
   }

 }
     
    die('<meta http-equiv="refresh" content="0; URL=panel.php">');


}catch(Exception $e)
{

    die("Error :".$e);

}
