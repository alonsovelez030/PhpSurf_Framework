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
 *---------------------------------------------------------------
 * VAIRBLES GLOBALES
 *---------------------------------------------------------------
 *
 * @global BASE_DIR                 Variable que contiene el Path original
 *                                  del projecto
 * @global DEFAULT_CONTROLLER       Variable que contiene el controlador
 *                                  principal por defecto
 * @global DEFAULT_METHOD           Variable que contiene el metodo
 *                                  principal por defecto
 * @global PATH_CONTROLLER          Contiene el path original de los controladores
 *
 * @global PATH_MODEL               Contiene el path original de los modelos
 *
 * @global PATH_VIEW                Contiene el path original de las vistas
 *
 */

/**
 *---------------------------------------------------------------
 * CONFIGURACIÓN GLOBAL
 *---------------------------------------------------------------
 * 
 * Este archivo carga todas las configuraciones globales, desde rutas
 * hasta variables por defecto con el fin de ser utilizadas
 * en caso de carecer de datos valiosos
 *
 */
	require_once 'config/global.php';


/**
 *---------------------------------------------------------------
 * CONTROLADOR BASE y LOADERS
 *---------------------------------------------------------------
 * 
 * Cargamos el controlador base, el cual nos provee 
 * de modelos, conexiones a base de datos, vistas
 * helpers y demás. Este es el controlador transversal
 * que permite la multi-herencia en nuestros controladores
 * y la carga de recursos útiles.
 *
 *
 */
	require_once 'core/BaseController.php';

/**
 *---------------------------------------------------------------
 * CONTROLADOR FRONTAL
 *---------------------------------------------------------------
 * 
 * Este archivo contiene la lista de funciones que se ejecutan 
 * en bloque, procesando los datos que le proveemos vía URL
 * el cual instancia el controlador que le pasemos vía url 
 * o un controlador por defecto cargador en las variables globales
 *
 */
	require_once 'core/FrontController.config.php';
	require_once 'config/routes.php';

/**
 *---------------------------------------------------------------
 * EJECUCIÓN DE PROCESOS INTERNOS
 *---------------------------------------------------------------
 *
 */
	if(isset($_GET["controller"])){
		$controllerObj=loadController($_GET["controller"]);
		callMethod($controllerObj);
	}else{
		$controllerObj=loadDefaultController();
		callMethod($controllerObj);
	}
?>
