<?php
/**
 * PhpSurf
 *
 * Esto es una aplicación Open Source
 *
 *
 * Copyright (c) 2017
 *
 * Framework de desarollo PhpSurf
 * Customizado y Testeado para la fabricación
 * De aplicaciones Web Completas.
 *
 *
 * @package  PhpSurf
 * @author   Alonso Velez Marulanda
 * @copyright    Copyright (c) 2017
 * @version  Version 1.0.0


 *
 *
 * --------------------------------------------------------------------
 * HELPERS VISTAS
 * --------------------------------------------------------------------
 *
 * Esta clase nos provee de métodos precargados para ser utilizados
 * en la vista que los instancie
 * 
 * @author  Alonso Velez Marulanda <alonso_work@hotmail.com>
 * 
 *
 * @global BASE_DIR                 Variable que contiene el Path original
 *                                  del projecto
 * @global DEFAULT_CONTROLLER       Variable que contiene el controlador
 *                                  principal por defecto
 * @global DEFAULT_METHOD           Variable que contiene el metodo
 *                                  principal por defecto
 *
 */


	class HelperViews{
	    
	    public function url($controller=DEFAULT_CONTROLLER,$method=DEFAULT_METHOD){
	    	$urlString= BASE_DIR."/".$controller."/".$method;
        	return $urlString;
	    }

	    public function PopUpBody(){
	    	 if (isset($_GET['request'])) {
			    ?>
				<body onload='notify("Notificacion","<?= $_GET['request']; ?>","custom_tooltip_error")'>
			    <?php
			  }else if(isset($_GET['requestok'])){
			  	?>
				<body onload='notify("Notificación","<?= $_GET['requestok']; ?>","custom_tooltip_success")'>
			    <?php
			  }else if(isset($_GET['requestinfo'])){
			  	?>
				<body onload='notify("Hola,Te informo que:","<?= $_GET['requestinfo']; ?>","custom_tooltip_info")'>
			    <?php
			  }else{
			  	?>
				<body>
			    <?php
			  }
	    }

	    public function unique_multidim_array($array, $key) { 
		    $temp_array = array(); 
		    $i = 0; 
		    $key_array = array(); 
		    
		    foreach($array as $val) { 
		        if (!in_array($val[$key], $key_array)) { 
		            $key_array[$i] = $val[$key]; 
		            $temp_array[$i] = $val; 
		        } 
		        $i++; 
		    } 
		    return $temp_array; 
		} 

	    public function generateFormToken($form){
		   // generar token de forma aleatoria
		   $token = md5(uniqid(microtime(), true));
		   // generar fecha de generación del token
		   $token_time = time();
		   // escribir la información del token en sesión para poder
		   // comprobar su validez cuando se reciba un token desde un formulario
		   $_SESSION['csrf'][$form.'_token'] = array('token'=>$token, 'time'=>$token_time);; 
		   return $token;
		}

		public function StringEncode($ses){     
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

		public function StringDecode($str){
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
	}
?>
