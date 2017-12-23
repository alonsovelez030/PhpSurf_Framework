<?php


function TestInput($input)//limpiar inputs
    {
    	$Array= array('<script>','</script>');
    	$data;
    	
    	$data = trim($input);
	    $data = stripslashes($input);
	    $data = htmlspecialchars($input);
	    $data = strip_tags($input);
	    $data = addslashes($input);
	    $data = str_replace($Array, "_", $input);
	    return $data;
    }

function TestMail($direccion)//validar Correos
	{
	   $express='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
	   if(preg_match($express,$direccion))
	      return true;
	   else
	     return false;
	}

function TestFacebook($Url)//Validamos Url de Facebook
	{
		if(!preg_match('/^(http\:\/\/|https\:\/\/)?((w{3}\.)?)facebook\.com\/(?:#!\/)?(?:pages\/)?(?:[\w\-\.]*\/)*([\w\-\.]*)+$/', $Url))
	    {
	        return false;
	    }
	    return true;
	}

function TestTwitter($Url)//Validamos Url de Twitter
	{
		if(!preg_match('/^(https?:\/\/)?((w{3}\.)?)twitter\.com\/(#!\/)?[a-z0-9_]+$/', $Url))
	    {
	        return false;   
	    }
	    return true;
	}

function TestUrl($Url)//Validamos una Url Común
	{
		if(!filter_var($Url, FILTER_VALIDATE_URL))
	    {
	        return false;   
	    }
	    return true;
	}

function TestPassword($val,$route)//validar seguridad de un password
	{
	 if(strlen($val) < 8)
	 {
		 header("Location:".$route."&request=El password es demasiado corto");
		 return false;
	 }
	 	return true;
	}
?>