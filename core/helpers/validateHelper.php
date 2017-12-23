<?php

	function ValidateSession($data,$IpReal,$api = NULL){//Función para validar las sesiones

		$route = BASE_DIR."/login&request=Iniciar Sesión";
		$route_logout = BASE_DIR."/login/logout/";


		if (isset($data['Id_Usuario'])) {
			if ($data['navUser'] != $_SERVER['HTTP_USER_AGENT'] or 
				$data['Ipuser'] != $IpReal or 
				$data['hostUser'] != gethostbyaddr($IpReal)) 
			{
			   session_destroy();//destruimos la sesión
			   $parametros_cookies = session_get_cookie_params();// traemos lo que contenga la cookie
			   setcookie(session_name(),0,1,$parametros_cookies["path"]);// destruimos la cookie
			   session_start();
			   session_regenerate_id(true);
			   if ($api == true){
					return false;
				}else{
					header("Location:$route");
				}
			}else{
				$TimeSession = SessionTime($data['Tiempo'],$route_logout,$api);
				if ($TimeSession) {
					$_SESSION['Data']['Tiempo'] = date("Y-n-j H:i:s");

					return true;
				}
			}
		}else{
			if ($api == true){
				return false;
			}else{
				header("Location:$route");
			}
		}
	}
	function SessionTime($Session,$route, $api = NULL){//validamos el estado de vida, de la sesión
		if (isset($Session)) {
		    $InicioSesion=$Session;
		    $TiempoActual = date("Y-n-j H:i:s"); 
		    $TiempoTotal=(strtotime($TiempoActual)-strtotime($InicioSesion)); 
		    if ($TiempoTotal>=1500) {
		    	if($api == true){
		    		return false;
		    	}else{
		      		header("Location:$route");
		    	}
		    }else{
		    	return true;
		    }
		}
	}

?>