<?php

function imageValidation($tmpname)
{
    if(is_uploaded_file($tmpname['tmp_name'])===true)
    {
        //only jpeg allowed
        if(exif_imagetype($tmpname['tmp_name'])) 
        {            
            return true;
        }
    }
    return false;
}


function altValidation($itext)
{
    if (!empty($itext))
    {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$itext))
        {
             return false;
        }
        return true;
    }
    return false;
}

function testAlt($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
