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
 * --------------------------------------------------------------------
 * FUNCIONES PREDEFINIDIAS PARA CONTROLADORES
 * --------------------------------------------------------------------
 *
 * Este conjunto de funciones predefinidas, pueden ser cargadas
 * y utilizadas por el usuario en el controlador, para procesar datos y reutilizar 
 * código
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

// --------------------------------------------------------------------

/**  
 *
 * @function redirect()   función para hacer una redirección a cualquier controlador
 *
 **/
	function redirect($controller=DEFAULT_CONTROLLER,$method=DEFAULT_METHOD){
		header("Location:".BASE_DIR."/".$controller."/".$method);
	}

// --------------------------------------------------------------------

/**  
 *
 * @function url()   retorna un path con el controlador y el método que se le pase
 *                   caso contrario, retorna los datos con el controlador y el método por defecto
 *
 **/	
	function url($controller=DEFAULT_CONTROLLER,$method=DEFAULT_METHOD){
        $urlString= $controller."/".$method;
        return $urlString;
    }

// --------------------------------------------------------------------

/**  
 *
 * Parametro que se le pasa a la función cuando existe un 3 dato via URI
 *
 * @param  string   $data 
 *
 * @function proccessPrameter()   Elimina del parametro una barra invertida o simplemente la ignora
 *
 **/
    function proccessParameter($data){
    	if (preg_match("[/]", $data)) {
    		return str_replace("/","",$data);
    	}else{
    		return $data;
    	}
    }
?>