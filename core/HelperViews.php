<?php
/**
 * MVC_CUSTOM
 *
 * Esto es una aplicación Open Source
 *
 *
 * Copyright (c) 2017
 *
 * Framework de desarollo PHP
 * Customizado y Testeado para la fabricación
 * De aplicaciones Web Completas.
 *
 *
 * @package  MVC_CUSTOM
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
	    
	    //Helpers para las vistas
	}
?>
