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
	define("DEFAULT_CONTROLLER", "home");
	define("DEFAULT_METHOD", "index");
	define("SERVER_DIR", "http://localhost/");
	define("BASE_DIR", dirname($_SERVER['PHP_SELF']));
	define("PATH_CONTROLLER","app/controller/");
	define("PATH_MODEL","app/model/");
	define("PATH_VIEW","app/view/");
	define("PATH_MEDIA","design/img/");
?>
