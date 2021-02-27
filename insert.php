<?php

include 'include/validation.php';

try
{

  if ($_SERVER["REQUEST_METHOD"] === "POST")
  {
   
    if(isset($_POST["img_alt"])&&isset($_FILES['img_file']))
    {
      $iAlt=testAlt($_POST["img_alt"]);
      $iSlide=$_FILES['img_file'];
      
      if(imageValidation($iSlide)&&altValidation($iAlt))
      {

        include 'include/connection.php';
        $stmt = $conn->prepare("INSERT INTO ".$tableName." (id , alt , address) VALUES (NULL, :iAlt , :iAddress)");
        $iSlideAddress="files/".uniqid('img_',false); 
        move_uploaded_file($iSlide['tmp_name'],$iSlideAddress);
        $stmt->execute(array(':iAlt' => $iAlt,'iAddress'=>$iSlideAddress));          
        $conn=null; 
        
      }

    }

  }

  die('<meta http-equiv="refresh" content="0; URL=panel.php">');

}catch(Exception $e)
{
  die("Error :".$e);
}
