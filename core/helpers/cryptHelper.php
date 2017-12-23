<?php

function StringEncode($ses)//Encriptar cadena de caracteres
    {     
      $stringEncoder=$ses;
	  $sesencoded = $stringEncoder;  
	  $num = mt_rand(4,4);  

	  for($i=1;$i<=$num;$i++)
	  {  
	     $sesencoded = base64_encode($sesencoded);  
	  }  
	  $alpha_array =  
	  array('Y','D','U','R','P',  
	  'S','B','M','A','T','H');  
	  $sesencoded =  
	  $sesencoded."+".$alpha_array[$num];  
	  $sesencoded = base64_encode($sesencoded);  
	  return $sesencoded;  
	}

function StringDecode($str)//Des-Encriptar cadena de caracteres
	{  
	   $StringDecoder=$str;
	   $alpha_array =  
	   array('Y','D','U','R','P',  
	   'S','B','M','A','T','H');  
	   $decoded = base64_decode($StringDecoder);  
	   list($decoded,$letter) = split("\+",$decoded);  

	   for($i=0;$i<count($alpha_array);$i++)
	   {  
		   if($alpha_array[$i] == $letter)  
		   break;  
	   }  

	   for($j=1;$j<=$i;$j++)
	   {  
	      $decoded = base64_decode($decoded);  
	   }  
	   return $decoded;  
	}

function HashPassword($password)//Función Para encriptar contraseñas....
	{
	    $opciones = [
	    'cost' => 11,
	    ];
	    return password_hash($password, PASSWORD_BCRYPT, $opciones);
	}

	
function generateFormToken($form) //Función para crear token
	{
	   // generar token de forma aleatoria
	   $token = md5(uniqid(microtime(), true));
	   // generar fecha de generación del token
	   $token_time = time();
	   // escribir la información del token en sesión para poder
	   // comprobar su validez cuando se reciba un token desde un formulario
	   $_SESSION['csrf'][$form.'_token'] = array('token'=>$token, 'time'=>$token_time);; 
	   return $token;
	}


function verifyFormToken($form, $token, $delta_time=0)//función para valira tokens
	{
	   // comprueba si hay un token registrado en sesión para el formulario
	   if(!isset($_SESSION['csrf'][$form.'_token']))
	   {
	       return false;
	   }
	   // compara el token recibido con el registrado en sesión
	   if ($_SESSION['csrf'][$form.'_token']['token'] !== $token) 
	   {
	       return false;
	   }
	   // si se indica un tiempo máximo de validez del ticket se compara la
	   // fecha actual con la de generación del ticket
	   if($delta_time > 0)
	   {
	       $token_age = time() - $_SESSION['csrf'][$form.'_token']['time'];
	       if($token_age >= $delta_time)
	       {
	          return false;
	       }
	   }
	   return true;
	}

?>